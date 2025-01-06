<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DummyUsers extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userData = [
            [
                'name'=>"Aflah Agus Rizkika",
                'email'=>"raaflahar@gmail.com",
                'password'=>bcrypt('12345678')
            ],
        ];

        foreach ($userData as $key => $val){
            User::create($val);
        }
    }
}
