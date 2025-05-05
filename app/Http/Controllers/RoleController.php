<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class RoleController extends Controller
{
    //
    public function index()
    {
        $roles = Role::with('permissions')->get();
        $permissions = Permission::all();
        return view('admin.vistas.roles.index', compact('roles', 'permissions'));
    }

    public function list(Request $request)
    {
        if ($request->ajax()) {
            $roles = Role::with('permissions')->select('id', 'name');
            return DataTables::of($roles)
                ->addColumn('permissions', function ($role) {
                    return $role->permissions->map(function ($p) {
                        return '<span class="badge bg-info">' . $p->name . '</span>';
                    })->implode(' ');
                })
                ->addColumn('actions', function ($role) {
                    return '
                        <button class="btn btn-sm btn-warning editBtn" data-id="' . $role->id . '"><i class="ti ti-pencil"></i></button>
                        <button class="btn btn-sm btn-danger deleteBtn" data-id="' . $role->id . '"><i class="ti ti-trash"></i></button>
                    ';
                })
                ->rawColumns(['permissions', 'actions'])
                ->make(true);

            }
    }

    public function createPermission(Request $request)
    {
        $request->validate(['name' => 'required|unique:permissions,name']);
        $permission = Permission::create(['name' => $request->name]);
        return response()->json(['success' => 'Permiso creado correctamente.', 'permission' => $permission]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:roles,name',
            'permissions' => 'nullable|array'
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $role = Role::create(['name' => $request->name]);

       if ($request->has('permissions')) {
            /* $role->syncPermissions($request->permissions); */
            /* otra forma de hacerlo */
            $role->permissions()->sync($request->permissions);
        }

        return response()->json(['success' => 'Rol creado exitosamente.']);
    }

    public function edit($id)
    {
        $role = Role::findOrFail($id);
        $permissions = $role->permissions->pluck('name');

        return response()->json([
            'role' => $role,
            'permissions' => $permissions
        ]);
    }

    public function update(Request $request, $id)
    {
        $role = Role::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:roles,name,' . $role->id,
            'permissions_edit' => 'nullable|array'
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $role->update(['name' => $request->name]);
        $role->syncPermissions($request->permissions_edit ?? []);

        return response()->json(['success' => 'Rol actualizado exitosamente.']);
    }

    public function destroy($id)
    {
        $role = Role::findOrFail($id);
        $role->delete();

        return response()->json(['success' => 'Rol eliminado correctamente.']);
    }
}
