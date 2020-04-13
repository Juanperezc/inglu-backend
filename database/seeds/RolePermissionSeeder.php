<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //* users
        $permissionUV = Permission::create(['name' => 'view user']);
        $permissionUE = Permission::create(['name' => 'edit user']);
        $permissionUC = Permission::create(['name' => 'create user']);
        $permissionUD = Permission::create(['name' => 'delete user']);

        $role = Role::create(['name' => 'admin']);

        $role->syncPermissions([
            $permissionUV,
            $permissionUE,
            $permissionUC,
            $permissionUD]);

        $role = Role::create(['name' => 'medical_staff']);

        $role->syncPermissions([
            $permissionUV,
            $permissionUE,
            $permissionUC,
            $permissionUD]);

        $role = Role::create(['name' => 'collaborator']);

        $role->syncPermissions([
           /*  $permissionUV,
            $permissionUE,
            $permissionUC,
            $permissionUD */]);

        $role = Role::create(['name' => 'patient']);

        
    }
}
