<?php

namespace Database\Seeders;

use App\Models\Tarefa;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        $usuario1 = User::factory()->create([
            'name' => 'Usuario 1',
            'email' => 'usuario1@example.com',
            'tarefas' => \App\Models\Tarefa::factory()->count(5)->create(),
        ]);

    }
}
