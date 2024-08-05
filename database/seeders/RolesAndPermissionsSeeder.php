<?php

namespace Database\Seeders;


use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesAndPermissionsSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    // Reset cached roles and permissions
    app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

    // create permissions
    Permission::findOrCreate('create users');
    Permission::findOrCreate('update users');
    Permission::findOrCreate('delete users');
    Permission::findOrCreate('view users');

    Permission::findOrCreate('impersonate users');

    Permission::findOrCreate('create roles');
    Permission::findOrCreate('update roles');
    Permission::findOrCreate('delete roles');
    Permission::findOrCreate('view roles');

    Permission::findOrCreate('create permission');
    Permission::findOrCreate('update permission');
    Permission::findOrCreate('delete permission');
    Permission::findOrCreate('view permission');

    Permission::findOrCreate('create roadmap items');
    Permission::findOrCreate('update roadmap items');
    Permission::findOrCreate('delete roadmap items');
    Permission::findOrCreate('view roadmap items');

    Permission::findOrCreate('view news letters');
    Permission::findOrCreate('create news letters');
    Permission::findOrCreate('update news letters');
    Permission::findOrCreate('delete news letters');

    Permission::findOrCreate('view blog section');
    Permission::findOrCreate('create blog section');
    Permission::findOrCreate('update blog section');
    Permission::findOrCreate('delete blog section');

    Permission::findOrCreate('create reviews');
    Permission::findOrCreate('update reviews');
    Permission::findOrCreate('delete reviews');
    Permission::findOrCreate('view reviews');

    Permission::findOrCreate('update settings');

    // this can be done as separate statements
    $role = Role::findOrCreate('Super Admin');
    $role->givePermissionTo(Permission::all());
  }
}
