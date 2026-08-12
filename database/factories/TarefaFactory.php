<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tarefa>
 */
class TarefaFactory extends Factory
{
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'titulo' => fake()->sentence(4),
            'descricao' => fake()->paragraph(3),
            'status' => fake()->randomElement(['pendente', 'em_andamento', 'concluida']),
            'prazo' => fake()->dateTimeBetween('now', '+30 days'),
            'prioridade' => fake()->numberBetween(1, 5),
            'concluido_em' => null,
        ];
    }

    public function concluida(): static
    {
        return $this->state(function (array $attributes) {
            return [
                'status' => 'concluida',
                'concluido_em' => fake()->dateTimeBetween('-30 days', 'now'),
            ];
        });
    }

    public function atrasada(): static
    {
        return $this->state(function (array $attributes) {
            return [
                'status' => 'pendente',
                'prazo' => fake()->dateTimeBetween('-30 days', '-1 days'),
            ];
        });
    }
}
