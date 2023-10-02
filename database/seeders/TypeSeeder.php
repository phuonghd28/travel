<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('types')->insert([
            [
                'id' => 1,
                'name' => 'Du Lịch',
                'image' => 'https://cdn.tgdd.vn/Files/2021/06/20/1361753/top-10-dia-diem-du-lich-dep-noi-tieng-tai-cat-ba-hai-phong-202201141340328102.jpg',
                'created_at' => Carbon::now()
            ],
            [
                'id' => 2,
                'name' => 'Ẩm thực',
                'image' => 'https://elitetour.com.vn/files/images/Blogs/foodtourhaiphong.jpg',
                'created_at' => Carbon::now()
            ],
        ]);
    }
}
