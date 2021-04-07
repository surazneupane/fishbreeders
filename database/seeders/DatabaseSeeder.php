<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder {
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run() {
        // \App\Models\User::factory(10)->create();

        $permission = Permission::create([
            "name" => "user_access",
        ]);

        $role = Role::create([
            "name" => "admin",
        ]);

        $role->permissions()->attach($permission->id);

        $user = User::create(
            [
                "name"     => "Admin",
                "email"    => "admin@example.com",
                "password" => Hash::make("admin"),
                "status"   => true,
            ]
        );

        $user->roles()->attach($role->id);

        $user = User::create(
            [
                "name"     => "editor",
                "email"    => "editor@example.com",
                "password" => Hash::make("editor"),
                "status"   => true,
            ]
        );

        $permission = Permission::create([
            "name" => "post_access",
        ]);

        $role->permissions()->attach($permission->id);

        $role = Role::create([
            "name" => "editor",
        ]);

        $role->permissions()->attach($permission->id);

        $user->roles()->attach($role->id);

        Role::create([
            "name" => "user",
        ]);
        Category::create([
            'title'          => 'FreshWater Fish',
            'status'         => 1,
            'show_in_header' => 1,
            'show_in_footer' => 1,
            'slug'           => 'fresh-water-fish',
        ]
        );

        Category::create([
            'title'          => 'SaltWater Fish',
            'status'         => 1,
            'show_in_header' => 1,
            'show_in_footer' => 1,
            'slug'           => 'salt-water-fish',
        ]
        );
        Category::create([
            'title'          => 'Breeding Articles',
            'status'         => 1,
            'show_in_header' => 1,
            'show_in_footer' => 1,
            'slug'           => 'breeding-articles',
        ]
        );

    }
}
