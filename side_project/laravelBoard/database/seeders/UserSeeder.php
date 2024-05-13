<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory(10)->create();
        
        // 관리자 데이터 추가
        // $arr =[
        //     'name' => '관리자'
        //     ,'email' => 'ad@ad.com'
        //     ,'password' => Hash::make('q1')
        // ];
        // User::create($arr);
    }
}
