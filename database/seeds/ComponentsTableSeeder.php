<?php

use Illuminate\Database\Seeder;

class ComponentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('components')->insert([
            ['component_type' => '7 Core Values', 'unit_id' => '1', 'question_number' => '30', 'duration' => '30'],
            ['component_type' => 'Agile Fundamentals', 'unit_id' => '2', 'question_number' => '30', 'duration' => '20'],
            ['component_type' => 'Android', 'unit_id' => '3', 'question_number' => '30', 'duration' => '20'],
            ['component_type' => 'Div3_Process', 'unit_id' => '1', 'question_number' => '30', 'duration' => '20'],
            ['component_type' => 'Git', 'unit_id' => '2', 'question_number' => '30', 'duration' => '20'],
            ['component_type' => 'ISO_en', 'unit_id' => '3', 'question_number' => '60', 'duration' => '30'],
            ['component_type' => 'ISO_vi', 'unit_id' => '1', 'question_number' => '60', 'duration' => '30'],
            ['component_type' => 'Java Core', 'unit_id' => '2', 'question_number' => '25', 'duration' => '20'],
            ['component_type' => 'MySQL', 'unit_id' => '3', 'question_number' => '30', 'duration' => '20'],
            ['component_type' => 'MySQL Exercise', 'unit_id' => '1', 'question_number' => '30', 'duration' => '20'],
            ['component_type' => 'PHP Basic', 'unit_id' => '2', 'question_number' => '25', 'duration' => '20'],
            ['component_type' => 'Ruby', 'unit_id' => '3', 'question_number' => '30', 'duration' => '20'],
            ['component_type' => 'Ruby on Rails', 'unit_id' => '1', 'question_number' => '30', 'duration' => '20'],
        ]);
    }
}
