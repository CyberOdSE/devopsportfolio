<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::truncate();

        $csvFile = fopen(base_path("database/data/users.csv"), "r");

        $firstline = true;
        while (($data = fgetcsv($csvFile,  separator: ",")) !== FALSE) {
            if (!$firstline) {
                User::create([
                    "name" => $data['0'],
                    "email" => $data['1'],
                    "password" => Hash::make($data['2']),
                    "is_admin" => $data['3'],
                ]);
            }
            $firstline = false;
        }
        fclose($csvFile);
    }
}
