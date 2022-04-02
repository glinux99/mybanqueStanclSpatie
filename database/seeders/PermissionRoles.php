<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;
class PermissionRoles extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app()[PermissionRegistrar::class]->forgetCachedPermissions();
        Permission::create(['name'=>'create customers']);
        Permission::create(['name'=>'depot']);
        Permission::create(['name'=>'retrait']);
        Permission::create(['name'=>'delete customers']);
        Permission::create(['name'=>'virement']);
        Permission::create(['name'=>'connect']);
        Permission::create(['name'=>'donner role']);
        Role::create(['name'=>'admin']);
        Role::create(['name'=>'caissier']);
        Role::create(['name'=>'client']);
        Role::create(['name'=>'autre']);
    }
}
