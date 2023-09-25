<?php

namespace Database\Seeders;

use App\Enums\Role;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'email' => 'admin@gmail.com',
                'name' => 'admin',
                'password' => Hash::make('123456'),
                'created_at' => Carbon::now(),
            ],
        ]);
    }
}
