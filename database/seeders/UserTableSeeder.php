<?php

namespace Database\Seeders;

use Hash;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Seeder;
use Faker\Factory as FakerFactory;
use Illuminate\Support\Str;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        $faker = FakerFactory::create('vi_VN'); // Sử dụng ngôn ngữ và vùng của Việt Nam

        $role1 = Role::find(1);
        $role2 = Role::find(2);
        $role3 = Role::find(3);

        for ($i = 1; $i <= 10; $i++) {
            $name = $faker->name;
            $nameWithoutAccents = Str::ascii($name); // Chuyển tên thành viết không dấu
            $nameWithoutSpaces = str_replace(' ', '', $nameWithoutAccents); // Loại bỏ khoảng trống
            $user = User::create([
                'name' => $name,
                'email' => $nameWithoutSpaces . '_195122' . str_pad($i, 4, '0', STR_PAD_LEFT) . '@dau.edu.vn',
                'password' => Hash::make('12345678')
            ]);
            $user->assignRole($role1);
        }

        for ($i = 1; $i <= 10; $i++) {
            $name = $faker->name;
            $nameWithoutAccents = Str::ascii($name);
            $nameWithoutSpaces = str_replace(' ', '', $nameWithoutAccents);
            $user = User::create([
                'name' => $name,
                'email' => $nameWithoutSpaces . '_195122' . str_pad($i, 4, '0', STR_PAD_LEFT) . '@dau.edu.vn',
                'password' => Hash::make('12345678')
            ]);
            $user->assignRole($role2);
        }

        for ($i = 1; $i <= 10; $i++) {
            $name = $faker->name;
            $nameWithoutAccents = Str::ascii($name);
            $nameWithoutSpaces = str_replace(' ', '', $nameWithoutAccents);
            $user = User::create([
                'name' => $name,
                'email' => $nameWithoutSpaces . '_195122' . str_pad($i, 4, '0', STR_PAD_LEFT) . '@dau.edu.vn',
                'password' => Hash::make('12345678')
            ]);
            $user->assignRole($role3);
        }
    }
}
