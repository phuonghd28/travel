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
                'name' => 'Cát Bà',
                'image' => 'https://cdn.tgdd.vn/Files/2021/06/20/1361753/top-10-dia-diem-du-lich-dep-noi-tieng-tai-cat-ba-hai-phong-202201141340328102.jpg',
                'created_at' => Carbon::now()
            ],
            [
                'id' => 2,
                'name' => 'Đồ Sơn',
                'image' => 'https://glexhomes.vn/Upload/9312efd3a2171d2b81c95131ccea1714.jpg',
                'created_at' => Carbon::now()
            ],
            [
                'id' => 3,
                'name' => 'Tuyệt tình cốc',
                'image' => 'https://cdn.discordapp.com/attachments/767030805738160130/1153740062958305390/tuyet-tinh-coc-hai-phong-4_1.jpg',
                'created_at' => Carbon::now()
            ],
            [
                'id' => 4,
                'name' => 'Food tour',
                'image' => 'https://vcdn-dulich.vnecdn.net/2022/05/07/F1-4920-1651942244.jpg',
                'created_at' => Carbon::now()
            ],
        ]);
    }
}
