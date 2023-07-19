<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class QuestionOptionsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        \DB::table('question_options')->delete();

        \DB::table('question_options')->insert([
            [
                'id' => 1,
                'option_name' => 'Chỉ có 1',
                'question_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 2,
                'option_name' => 'Chỉ có 2',
                'question_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 3,
                'option_name' => 'Cả hai',
                'question_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 4,
                'option_name' => 'Không phải 1 cũng không phải 2',
                'question_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 5,
                'option_name' => 'Sáu bit',
                'question_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 6,
                'option_name' => 'Tám bit',
                'question_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 7,
                'option_name' => 'Mười hai bit',
                'question_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 8,
                'option_name' => 'Mười lăm bit',
                'question_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 9,
                'option_name' => 'Chỉ có 1',
                'question_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 10,
                'option_name' => 'Chỉ có 2',
                'question_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 11,
                'option_name' => 'Cả hai',
                'question_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 12,
                'option_name' => 'Không phải 1 cũng không phải 2',
                'question_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
