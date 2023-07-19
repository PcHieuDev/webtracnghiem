<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ClassroomsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        \DB::table('classrooms')->delete();

        \DB::table('classrooms')->insert([
            [
                'id' => 1,
                'classroom_name' => 'Tiếng Anh',
                'classroom_unique_id' => '3174',
                'teacher_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 2,
                'classroom_name' => 'Sinh Học',
                'classroom_unique_id' => '38533',
                'teacher_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 3,
                'classroom_name' => 'Khoa học máy tính',
                'classroom_unique_id' => '2849',
                'teacher_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
