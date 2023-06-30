<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\User\UserProfile;
use App\Models\User\UserSocialMedia;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;





use Illuminate\Database\Seeder;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // create roles and assign created permissions        
        $role = Role::create(['name' => 'super-administrator']);
        $role->givePermissionTo(Permission::all());

        // Role Administrator
        $role1 = Role::create(['name' => 'administrator']);
        // Hak Akses User - Administrator
        $role1->givePermissionTo('create user-administrasi');
        $role1->givePermissionTo('read user-administrasi');
        $role1->givePermissionTo('update user-administrasi');
        $role1->givePermissionTo('delete user-administrasi');

        // Role Unit
        $role2 = Role::create(['name' => 'unit']);
        $role2->givePermissionTo('read user-administrasi');

        // Create Akun User
        $defaultUser = [
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ];

        $superadmin = User::create(array_merge($defaultUser,[
            'name' => 'Achmad Izaaz',
            'email' => 'achmadizaaz@unmerpas.ac.id',
            'slug' => 'achmad-izaaz',
            'status' => 'active'
        ]));
        UserProfile::create([
            'user_id'=>$superadmin->id,
            'birth' => '2020-01-01',
            'gender' => 1
        ]);
        UserSocialMedia::create(['user_id'=>$superadmin->id]);
        $superadmin->assignRole($role);


        $admin = User::create(array_merge($defaultUser,[
            'name' => 'Administrator',
            'email' => 'admin@unmerpas.ac.id',
            'slug' => 'administrator',
            'status' => 'active'
        ]));
        UserProfile::create([
            'user_id'=>$admin->id,
            'birth' => '2020-01-01',
            'gender' => 0
        ]);
        UserSocialMedia::create(['user_id'=>$admin->id]);
        $admin->assignRole($role1);

        $user = User::create(array_merge($defaultUser,[
            'name' => 'User',
            'email' => 'user@unmerpas.ac.id',
            'slug' => 'user',
            'status' => 'deactivated'
        ]));
        UserProfile::create([
            'user_id'=>$user->id,
            'birth' => '2020-01-01',
            'gender' => 1
        ]);
        UserSocialMedia::create(['user_id'=>$user->id]);
        $user->assignRole($role2);


    }
}
