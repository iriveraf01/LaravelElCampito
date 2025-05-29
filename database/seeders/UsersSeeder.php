<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([

        ]);
        $usuarios = User::all(); // Trae todos los usuarios existentes

        foreach ($usuarios as $user) {
            // Aquí haces lo que quieras con cada usuario
            echo "Usuario encontrado: {$user->name} ({$user->email})\n";
    }
}}
