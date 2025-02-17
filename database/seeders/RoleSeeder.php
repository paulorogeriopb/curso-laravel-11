<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        if (!Role::where('name', 'Super Admin')->first()) {
            Role::create([
                'name' => 'Super Admin',
            ]);
        }

        if (!Role::where('name', 'Admin')->first()) {
            $admin = Role::create([
                'name' => 'Admin',
            ]);
        } else {
            $admin = Role::where('name', 'Admin')->first();
        }

        // Cadastrar permissão para o papel
        $admin->givePermissionTo([

            'index-user',
            'show-user',
            'create-user',
            'edit-user',
            'edit-user-password',
            'destroy-user',
            'generate-pdf-user',
            'generate-csv-user',

            'index-course',
            'show-course',
            'create-course',
            'edit-course',
            'destroy-course',

            'index-classe',
            'show-classe',
            'create-classe',
            'edit-classe',
            'destroy-classe',

            'index-role',
            'create-role',
            'edit-role',
            'destroy-role',

            'index-role-permission',
            'update-role-permission',
        ]);

        // Remover a permissão de acesso
        // $admin->revokePermissionTo([
        //     'update-role-permission',
        // ]);

        if (!Role::where('name', 'Professor')->first()) {
            $teacher = Role::create([
                'name' => 'Professor',
            ]);
        } else {
            $teacher = Role::where('name', 'Professor')->first();
        }

        // Cadastrar permissão para o papel
        $teacher->givePermissionTo([

            'index-user',
            'show-user',
            'generate-pdf-user',
            'generate-csv-user',
            
            'index-course',
            'show-course',
            'create-course',
            'edit-course',
            'destroy-course',

            'index-classe',
            'show-classe',
            'create-classe',
            'edit-classe',
            'destroy-classe',
        ]);

        if (!Role::where('name', 'Tutor')->first()) {
            $tutor = Role::create([
                'name' => 'Tutor',
            ]);
        } else {
            $tutor = Role::where('name', 'Tutor')->first();
        }

        // Cadastrar permissão para o papel
        $tutor->givePermissionTo([

            'index-user',
            'show-user',
            
            'index-course',
            'show-course',
            'edit-course',

            'index-classe',
            'show-classe',
            'edit-classe',
        ]);

        if (!Role::where('name', 'Aluno')->first()) {
            Role::create([
                'name' => 'Aluno',
            ]);
        } else {
            $admin = Role::where('name', 'Aluno')->first();
        }
    }
}
