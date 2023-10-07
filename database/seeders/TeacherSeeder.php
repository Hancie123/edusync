<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class TeacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name'=>"Hancie Phago",
            'email'=>"hanciewanemphago@gmail.com",
            'password'=>Hash::make('0720'),
            'status'=>"Active",
            'email_verified_at'=>now(),


        ]);
    }
}
