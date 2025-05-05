<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;

class PermissionController extends Controller
{
    //
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $permissions = Permission::select(['id', 'name', 'created_at']);

            return DataTables::of($permissions)
                ->addColumn('actions', function ($row) {
                    return '
                        <button data-id="'.$row->id.'" class="btn btn-sm btn-primary editBtn"><i class="ti ti-pencil"></i></button>
                        <button data-id="'.$row->id.'" class="btn btn-sm btn-danger deleteBtn"><i class="ti ti-trash"></i></button>
                    ';
                })
                ->rawColumns(['actions'])
                ->make(true);
        }

        return view('admin.vistas.permisos.index');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255|unique:permissions,name',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        Permission::create(['name' => $request->name]);

        return response()->json(['success' => 'Permiso creado correctamente.']);
    }

    public function show($id)
    {
        $permission = Permission::findOrFail($id);
        return response()->json($permission);
    }

    public function update(Request $request, $id)
    {
        $permission = Permission::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255|unique:permissions,name,' . $permission->id,
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $permission->update(['name' => $request->name]);

        return response()->json(['success' => 'Permiso actualizado correctamente.']);
    }

    public function destroy($id)
    {
        $permission = Permission::findOrFail($id);
        $permission->delete();

        return response()->json(['success' => 'Permiso eliminado correctamente.']);
    }
}
