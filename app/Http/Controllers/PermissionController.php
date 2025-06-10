<?php

namespace App\Http\Controllers;

use App\Http\Requests\PermissionRequest;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;
use Illuminate\Routing\Controller as BaseController;


class PermissionController extends BaseController
{
    public function __construct()
    {
        $this->middleware('permission:manage_publicaciones');
    }
    public function index(Request $request)
    {
        // if (!Auth::user()->can('manage_permisos')) {
        //     abort(403, 'No tienes permiso.');
        // }
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

    public function store(PermissionRequest $request)
    {
        // if (!Auth::user()->can('manage_permisos')) {
        //     abort(403, 'No tienes permiso.');
        // }



        Permission::create(['name' => $request->name]);

        return response()->json(['success' => 'Permiso creado correctamente.']);
    }

    public function show($id)
    {
        // if (!Auth::user()->can('manage_permisos')) {
        //     abort(403, 'No tienes permiso.');
        // }
        $permission = Permission::findOrFail($id);
        return response()->json($permission);
    }

    public function update(PermissionRequest $request, $id)
    {
        // if (!Auth::user()->can('manage_permisos')) {
        //     abort(403, 'No tienes permiso.');
        // }

        $permission = Permission::findOrFail($id);


        $permission->update(['name' => $request->name]);

        return response()->json(['success' => 'Permiso actualizado correctamente.']);
    }

    public function destroy($id)
    {
        // if (!Auth::user()->can('manage_permisos')) {
        //     abort(403, 'No tienes permiso.');
        // }

        $permission = Permission::findOrFail($id);
        $permission->delete();

        return response()->json(['success' => 'Permiso eliminado correctamente.']);
    }
}
