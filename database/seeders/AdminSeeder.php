<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $defaultAdmins = [
            [
                "name" => "Admin Sapras",
                "type_role" => 1,
                "type_user" => "SAPRAS",
                "phonenumber" => "085156354339",
                "email" => "sapras@pens.ac.id",
                "password" => "adminadmin",
            ],
        ];

        foreach ($defaultAdmins as $admin) {
            try {
                User::updateOrCreate(
                    ['email' => $admin["email"]], // Kondisi untuk mencari pengguna
                    $admin
                );
                echo "\nCreate Default Admin: {$admin['name']}\n";
            } catch (\Throwable $th) {
                echo "\nError: {$th->getMessage()}\n";
            }
        }
    }
}
