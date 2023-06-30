<?php

namespace App\Http\Controllers\RolePermission;

use App\Http\Controllers\Controller;
use App\Models\Spatie\AccessModul;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionController extends Controller
{
    public function index()
    {

        // dd($roleSelected->name);
        $roles = Role::whereNotIn('name', ['super-administrator'])->get();
        // dd($roleSelected);
        return view('backend.permission.index', compact('roles'));
    }

    public function create(Request $request)
    {
        $allRoles = Role::whereNotIn('name', ['super-administrator'])->get();

        $role = Role::where('name', $request->role)->first();
        $permissions = Permission::all();


        // dd($role->users);
        if($request->modul == 'administrasi-modul'){
            $modul = 'administrasi-modul';
            session()->flash('success', $role->name);
            return view('backend.permission.create', compact('modul', 'allRoles', 'role', 'permissions'));
        }
        abort(403);
    }

    public function store(Request $request)
    {
        // Get Role 
        $role = Role::where('name', $request->role)->first();

        // Check Permission di AccessModul
        $checkAccessModul = AccessModul::where('role_id',  $role->id)
                                ->where('modul', $request->modul)
                                ->get();

        // Get role id by Array
        $pluckRole = $checkAccessModul->pluck('role_id')->toArray();

        // Get permission id by Array
        $pluckPermission = $checkAccessModul->pluck('permission_id')->toArray();
 
        // Hapus semua data, Role has Permission dan AccessModul 
        // Berdasarkan Role dan Modul yang di Pilih
        if($checkAccessModul){
         DB::table('role_has_permissions')
            ->whereIn('permission_id',$pluckPermission)
            ->whereIn('role_id', $pluckRole)
            ->delete(); 

         AccessModul::whereIn('permission_id',$pluckPermission)
            ->whereIn('role_id', $pluckRole)
            ->delete();
        }

        //  Tambahkan permission berdasarkan role ke AccessModul
        $syncPermission = $request->sync;

        foreach($request->sync as $sync => $no ){
            $input['role_id'] =  $role->id;
            $input['permission_id'] = $syncPermission[$sync];
            $input['modul'] = $request->modul;  
            $dataAccessModul[] = $input;
        }

        AccessModul::insert($dataAccessModul);

        // Ambil semua data permission AccessModul berdasarakan role dan modul
        $getPermissionAccessModul = AccessModul::where('role_id',  $role->id)->where('modul', $request->modul)->get();

        // Collection to Array (Permission Name)
        foreach($getPermissionAccessModul as $permissionName){
            $getPermission[] = $permissionName->permission->name;
        }

        // Give Role to Permission
        $role->givePermissionTo($getPermission);
        
        return redirect()->route('permissions.index')->with('success', 'Hak akses berhasil disimpan');
    }




    
}
