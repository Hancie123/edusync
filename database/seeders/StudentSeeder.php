<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'institution_id' => 1,
            'name' => "Shrawan Maharjan",
            'email' => "shrawan@gmail.com",
            'password' => Hash::make("password"),
            "address" => "Kathmandu",
            "phone" => "9813323445",
            "role" => "student",
            'email_verified_at' => now()

        ]);
    }
}