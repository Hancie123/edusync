<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name'=>"Prajwol Khadka",
            'email'=>"prajwolkhadka@gmail.com",
            'password'=>Hash::make("1234"),
            "address"=>"Kathmandu",
            "phone"=>"9813323445",
            "status"=>"admin",
            'email_verified_at'=>now()

        ]);
    }
}
