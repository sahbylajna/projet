<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;
use Illuminate\Support\Facades\Hash;
class PermissionsDemoSeeder extends Seeder
{
    /**
     * Create the initial roles and permissions.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        Permission::create(['name' => 'delegate']);


        $role2 = Role::create(['name' => 'delegate']);
        $role2->givePermissionTo('delegate');


        // $role3 = Role::create(['name' => 'Super-Admin']);
        // // gets all permissions via Gate::before rule; see AuthServiceProvider

        // // create demo users
        // $user = new \App\Models\User();
        // $user->first_name = "admin";
        // $user->last_name = "admin";
        // $user->email = "admin@admin.com";
        // $user->ud = "12346798";
        // $user->password = Hash::make("password");
        // $user->save();
        // $user->assignRole($role3);


    }
}
