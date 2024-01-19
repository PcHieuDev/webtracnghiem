<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;

class QuestionsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        \DB::table('questions')->delete();

        \DB::table('questions')->insert([
            [
                'id' => 1,
                'question' => 'Xem xét các tuyên bố sau:

                1. Hệ thống DNS được sử dụng bởi Internet cho phép máy tính xác định máy tính khác.

                2. Để kết nối với Internet, mỗi máy tính đều cần có một mã số duy nhất, được gọi là địa chỉ IP.

                Chọn câu trả lời đúng từ các mã dưới đây:',
                'answer' => 'Cả hai',
                'long_written' => 0,
                'quiz_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 2,
                'question' => 'Một nhóm gồm ………………... thường được gọi là một byte.',
                'answer' => 'Tám bit',
                'long_written' => 0,
                'quiz_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 3,
                'question' => 'Xem xét các tuyên bố sau:

                1. Công ty Cổ phần Công nghệ thông tin Aksh, một công ty CNTT, đã ra mắt chương trình Gramdoot tại Jaipur, Rajasthan.

                2. Dựa trên cáp quang, Công ty Cổ phần Công nghệ thông tin Aksh có phạm vi khoảng 3000 km.

                Chọn câu trả lời đúng từ các mã dưới đây:',
                'answer' => 'Cả hai',
                'long_written' => 0,
                'quiz_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 4,
                'question' => 'Viết về máy tính',
                'answer' => NULL,
                'long_written' => 1,
                'quiz_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
