<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Carbon\Carbon;


class QuizzesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        \DB::table('quizzes')->delete();

        \DB::table('quizzes')->insert([
            [
                'id' => 1,
                'quiz_name' => 'Bài kiểm tra 1 (Khoa học máy tính)',
                'per_question_mark' => 5,
                'classroom_id' => 3,
                'quiz_time' => '60', // Replace with quiz time in minutes
                'expired_quiz' => Carbon::now()->addDays(7)->format('Y-m-d'), // Example: Expire after 7 days
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 2,
                'quiz_name' => 'Bài kiểm tra 1 (Sinh Học)',
                'per_question_mark' => 10,
                'classroom_id' => 2,
                'quiz_time' => '60', // Replace with quiz time in minutes
                'expired_quiz' => Carbon::now()->addDays(7)->format('Y-m-d'), // Example: Expire after 7 days
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 3,
                'quiz_name' => 'Bài kiểm tra 1 (Tiếng Anh)',
                'per_question_mark' => 10,
                'classroom_id' => 1,
                'quiz_time' => '60', // Replace with quiz time in minutes
                'expired_quiz' => Carbon::now()->addDays(7)->format('Y-m-d'), // Example: Expire after 7 days
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
