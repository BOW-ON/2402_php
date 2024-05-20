<?php

namespace Database\Seeders;

use App\Models\Board;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // 시더를 여러개 실행 시키기 위해 call 사용
        $this->call([
            UserSeeder::class
        ]);
        Board::factory(50)->create();
    }
}
