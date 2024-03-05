<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class RoleAndPermissionSeeder extends Seeder
{
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        $permissions = [
            // header menu
            'main',
            'master',
            'transaction',
            'report',

            // sidebar-menu
            'dashboard',
            'inventory.management',
            'shipment.management',
            'report.management',
            'stock.management',

            // inventory
            'inventory.index',
            'inventory.create',
            'inventory.edit',
            'inventory.destroy',

            // shipment
            'shipment.index',
            'shipment.create',
            'shipment.edit',
            'shipment.destroy',

            // stock
            'stock.index',

            // report
            'report.index',
            'report.download',
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        // create roles admin
        $roleUser = Role::create(['name' => 'admin']);
        $roleUser->givePermissionTo([
            'main',
            'dashboard',
            'master',
            'inventory.management',
            'inventory.index',
            'inventory.create',
            'inventory.edit',
            'inventory.destroy',
            'transaction',
            'stock.management',
            'stock.index',
            'report',
            'report.management',
            'report.index',
            'report.download',
        ]);

        // create roles staff
        $role = Role::create(['name' => 'staff']);
        $role->givePermissionTo([
            'main',
            'dashboard',
            'master',
            'inventory.management',
            'inventory.index',
            'transaction',
            'shipment.management',
            'shipment.index',
            'shipment.create',
            'shipment.edit',
            'shipment.destroy',
            'stock.management',
            'stock.index',
        ]);

        $user = User::find(1);
        $user->assignRole('admin');
        $user = User::find(2);
        $user->assignRole('staff');
    }
}
