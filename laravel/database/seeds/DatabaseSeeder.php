<?php

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        Permission::create(['name' => 'edit articles']);
        Permission::create(['name' => 'delete articles']);
        Permission::create(['name' => 'publish articles']);
        Permission::create(['name' => 'unpublish articles']);

        Role::create(['name' => 'subscriber'])->givePermissionTo('edit articles');
        Role::create(['name' => 'admin'])->givePermissionTo([
            'publish articles',
            'unpublish articles'
        ]);
        Role::create(['name' => 'superadmin'])->givePermissionTo(Permission::all());

        factory(User::class)
            ->create([ 'email' => 'superadmin@site.com' ])
            ->assignRole('superadmin');

        factory(User::class)
            ->create([ 'email' => 'admin@site.com' ])
            ->assignRole('admin');

        factory(User::class)
            ->create([ 'email' => 'subscriber@site.com' ])
            ->assignRole('subscriber');

        factory(User::class, 5)
            ->create()
            ->each(function( $user ) {
                $user->assignRole('subscriber');
            });

    }
}
