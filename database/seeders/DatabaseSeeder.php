<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        //permissions
        
        Permission::insert([
            //users
            ["slug" => "manage:users", "description" => "Manage users"],
            ["slug" => "create:users", "description" => "Create users"],
            ["slug" => "update:users", "description" => "Update users"],
            ["slug" => "delete:users", "description" => "Delete users"],
            //baptisms
            ["slug" => "manage:baptisms", "description" => "Manage baptisms"],
            ["slug" => "create:baptisms", "description" => "Create baptisms"],
            ["slug" => "update:baptisms", "description" => "Update baptisms"],
            ["slug" => "delete:baptisms", "description" => "Delete baptisms"],
            //bouquets
            ["slug" => "manage:bouquets", "description" => "Manage bouquets"],
            ["slug" => "create:bouquets", "description" => "Create bouquets"],
            ["slug" => "update:bouquets", "description" => "Update bouquets"],
            ["slug" => "delete:bouquets", "description" => "Delete bouquets"],
            //eighteenths
            ["slug" => "manage:eighteenths", "description" => "Manage eighteenths"],
            ["slug" => "create:eighteenths", "description" => "Create eighteenths"],
            ["slug" => "update:eighteenths", "description" => "Update eighteenths"],
            ["slug" => "delete:eighteenths", "description" => "Delete eighteenths"],
            //eventImages
            ["slug" => "manage:eventImages", "description" => "Manage eventImages"],
            ["slug" => "create:eventImages", "description" => "Create eventImages"],
            ["slug" => "update:eventImages", "description" => "Update eventImages"],
            ["slug" => "delete:eventImages", "description" => "Delete eventImages"],
            //permissions
            ["slug" => "manage:permissions", "description" => "Manage permissions"],
            ["slug" => "create:permissions", "description" => "Create permissions"],
            ["slug" => "update:permissions", "description" => "Update permissions"],
            ["slug" => "delete:permissions", "description" => "Delete permissions"],
            //weddings
            ["slug" => "manage:weddings", "description" => "Manage weddings"],
            ["slug" => "create:weddings", "description" => "Create weddings"],
            ["slug" => "update:weddings", "description" => "Update weddings"],
            ["slug" => "delete:weddings", "description" => "Delete weddings"],
        ]);
        
        $thepdi = User::factory()->create([
            'name' => "thepdi",
            'email' => 'eminoviciidarius@gmail.com',
            "phone" => "0752096360",
            "super_admin" => 1,
            "password" => "30ianpdi"
        ]);

    }
}
