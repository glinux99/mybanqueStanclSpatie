<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;
class Roles extends Migration
{
    /**
     * Run the migrations.
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

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
