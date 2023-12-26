<?php

namespace Database\Seeders;

use App\Models\Institution;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class InstitutionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $institution=Institution::create([
            'name'=>'PCPS College',
            'address'=>'Kupondole',
            'email'=>'pcps@gmail.com',
            'established_year'=>'2018',
            'contact_number'=>'9845677786',
            'website_url'=>'pcpscollege.com.np',
            
            
        ]);

        User::create([
            'institution_id'=>$institution->id,
            'name' => "Prajwol Khadka",
            'email' => "prajwolkhadka@gmail.com",
            'password' => Hash::make("password"),
            "address" => "Kathmandu",
            "phone" => "9813323445",
            "role" => "admin",
            'email_verified_at' => now()

        ]);
    }
}