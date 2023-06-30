<?php

namespace App\Http\Controllers\RolePermission;

use App\Http\Controllers\Controller;
use App\Http\Requests\RolePermission\RoleRequest;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::whereNotIn('name', ['super-administrator'])->get();

        return view('backend.role.index', compact('roles'));
    }

    public function store(RoleRequest $request)
    {
        Role::create(['name' => strtolower($request->role)]);

        return back()->with('success', 'Role has been added');
    }

    public function destroy($id)
    {
        Role::find($id)->delete();
        
        return back()->with('success', 'Role has been deleted');
    }

}
