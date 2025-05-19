<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    //
    public function index(Request $request)
    {
        // if (!Auth::user()->can('manage_users')) {
        //     abort(403, 'No tienes permiso.');
        // }
        if ($request->ajax()) {
            $data = User::with('roles')->select('users.*');
            return DataTables::of($data)
                ->addColumn('roles', fn($row) => $row->roles->pluck('name')->implode(', '))
                ->addColumn('actions', function($row) {
                    return '<button class="btn btn-sm btn-warning editBtn" data-id="'.$row->id.'"><i class="ti ti-pencil"></i></button>
                            <button class="btn btn-sm btn-danger deleteBtn" data-id="'.$row->id.'"><i class="ti ti-trash"></i></button>';
                })
                ->rawColumns(['actions'])
                ->make(true);
        }

        $roles = Role::all();
        return view('admin.vistas.usuarios.index', compact('roles'));
    }

    public function store(Request $request)
    {
        // if (!Auth::user()->can('manage_users')) {
        //     abort(403, 'No tienes permiso.');
        // }

        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
            'role' => 'required|exists:roles,name',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        $user->assignRole($request->role);

        return response()->json(['success' => 'Usuario creado correctamente']);
    }

    public function show(User $user)
    {
        // if (!Auth::user()->can('manage_users')) {
        //     abort(403, 'No tienes permiso.');
        // }
        $user->load('roles');
        return response()->json($user);
    }

    public function update(Request $request, User $user)
    {
        // if (!Auth::user()->can('manage_users')) {
        //     abort(403, 'No tienes permiso.');
        // }
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email,'.$user->id,
            'password' => 'nullable|min:6|confirmed',
            'role' => 'required|exists:roles,name',
        ]);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password ? Hash::make($request->password) : $user->password,
        ]);

        $user->syncRoles([$request->role]);

        return response()->json(['success' => 'Usuario actualizado correctamente']);
    }

    public function destroy(User $user)
    {
        // if (!Auth::user()->can('manage_users')) {
        //     abort(403, 'No tienes permiso.');
        // }
        $user->delete();
        return response()->json(['success' => 'Usuario eliminado']);
    }
}
