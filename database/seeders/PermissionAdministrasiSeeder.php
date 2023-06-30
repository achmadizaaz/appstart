<?php

namespace Database\Seeders;

use Spatie\Permission\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionAdministrasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // START PERMISSION ADMINISTRASI SEEDER 
         // Reset cached roles and permissions
         app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();


        // Akses Modul Utama
        Permission::create(['name' => 'administrasi-modul']);

        // Hak akses modul User
        Permission::create(['name' => 'create user-administrasi']);
        Permission::create(['name' => 'read user-administrasi']);
        Permission::create(['name' => 'update user-administrasi']);
        Permission::create(['name' => 'delete user-administrasi']);
        Permission::create(['name' => 'reset user-administrasi']);

        // Hak akses modul Role & Permission
         Permission::create(['name' => 'menu role-permission-administrasi']);
        //  Role
         Permission::create(['name' => 'create role-administrasi']);
         Permission::create(['name' => 'read role-administrasi']);
         Permission::create(['name' => 'update role-administrasi']);
         Permission::create(['name' => 'delete role-administrasi']);
        // Permission
         Permission::create(['name' => 'create permission-administrasi']);
         Permission::create(['name' => 'read permission-administrasi']);
         Permission::create(['name' => 'update permission-administrasi']);
         Permission::create(['name' => 'delete permission-administrasi']);







        // END PERMISSION ADMINISTRASI SEEDER 
    }
}
