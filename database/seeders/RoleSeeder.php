<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
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

        $role1 = Role::create(['name' => 'admin']);
        $role2 = Role::create(['name' => 'user']);

        $user1 = User::factory()->create([
            'name' => "admin",
            'email' => 'admin@admin',
            'password' => bcrypt('11111111'),
        ]);

        $user1->assignRole($role1);

        $user2 = User::factory()->create([
            'name' => "user",
            'email' => 'user@user',
            'password' => bcrypt('11111111'),
        ]);

        $user2->assignRole($role2);
    }
}
