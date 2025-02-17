<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (!User::where('email', 'cesar@celke.com.br')->first()) {
            $superAdmin = User::create([
                'name' => 'Cesar',
                'email' => 'cesar@celke.com.br',
                'password' => Hash::make('123456a', ['rounds' => 12])
            ]);

            // Atribuir papel para o usuário
            $superAdmin->assignRole('Super Admin');
        }
        
        if (!User::where('email', 'kelly@celke.com.br')->first()) {
            $admin = User::create([
                'name' => 'Kelly',
                'email' => 'kelly@celke.com.br',
                'password' => Hash::make('123456a', ['rounds' => 12])
            ]);

            // Atribuir papel para o usuário
            $admin->assignRole('Admin');
        }
        
        if (!User::where('email', 'jessica@celke.com.br')->first()) {
            $teacher = User::create([
                'name' => 'Jessica',
                'email' => 'jessica@celke.com.br',
                'password' => Hash::make('123456a', ['rounds' => 12])
            ]);

            // Atribuir papel para o usuário
            $teacher->assignRole('Professor');
        }
        
        if (!User::where('email', 'gabrielly@celke.com.br')->first()) {
            $tutor = User::create([
                'name' => 'Gabrielly',
                'email' => 'gabrielly@celke.com.br',
                'password' => Hash::make('123456a', ['rounds' => 12])
            ]);

            // Atribuir papel para o usuário
            $tutor->assignRole('Tutor');
        }
        
        if (!User::where('email', 'marcos@celke.com.br')->first()) {
            $student = User::create([
                'name' => 'Marcos',
                'email' => 'marcos@celke.com.br',
                'password' => Hash::make('123456a', ['rounds' => 12])
            ]);

            // Atribuir papel para o usuário
            $student->assignRole('Aluno');
        }
    }
}
