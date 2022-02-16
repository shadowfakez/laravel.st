<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tasks')->insert([
            'creator_id' => rand(1, 10),
            'title' => 'тест 1',
            'content' => 'Купить шоколадку',
            'status_id' => rand(1, 3),
        ]);

        DB::table('tasks')->insert([
            'creator_id' => rand(1, 10),
            'title' => 'тест 2',
            'content' => 'Съесть шоколадку, если все заработает',
            'status_id' => rand(1, 3),
        ]);

        DB::table('tasks')->insert([
            'creator_id' => rand(1, 10),
            'title' => 'тест 3',
            'content' => 'Покормить кота',
            'status_id' => rand(1, 3),
        ]);

        DB::table('tasks')->insert([
            'creator_id' => rand(1, 10),
            'title' => 'тест 4',
            'content' => 'Завести кота',
            'status_id' => rand(1, 3),
        ]);

        DB::table('tasks')->insert([
            'creator_id' => rand(1, 10),
            'title' => 'тест 5',
            'content' => 'Пропылесосить',
            'status_id' => rand(1, 3),
        ]);

        DB::table('tasks')->insert([
            'creator_id' => rand(1, 10),
            'title' => 'тест 6',
            'content' => 'Вымыть полы',
            'status_id' => rand(1, 3),
        ]);

        DB::table('tasks')->insert([
            'creator_id' => rand(1, 10),
            'title' => 'тест 7',
            'content' => 'Позаниматься',
            'status_id' => rand(1, 3),
        ]);

        DB::table('tasks')->insert([
            'creator_id' => rand(1, 10),
            'title' => 'тест 8',
            'content' => 'Посмотреть сериал',
            'status_id' => rand(1, 3),
        ]);

        DB::table('tasks')->insert([
            'creator_id' => rand(1, 10),
            'title' => 'тест 9',
            'content' => 'Лечь спать',
            'status_id' => rand(1, 3),
        ]);

        DB::table('tasks')->insert([
            'creator_id' => rand(1, 10),
            'title' => 'тест 10',
            'content' => 'Проснуться и идти на работу =(',
            'status_id' => rand(1, 3),
        ]);
    }
}
