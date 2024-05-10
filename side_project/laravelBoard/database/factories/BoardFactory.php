<?php

namespace Database\Factories;

use App\Models\BoardName;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Board>
 */
class BoardFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        // 이미지 파일 배열
        $arrImg =[
            '/public/img/d1.png'
            ,'/public/img/f1.png'
            ,'/public/img/g1.png'
            ,'/public/img/o1.png'
            ,'/public/img/o2.png'
        ];
        return [
            'user_id' => User::inRandomOrder()->first()->id // inRandomOrder() : 랜덤으로 정렬
            ,'type' => BoardName::inRandomOrder()->first()->type
            ,'title' => $this->faker->realText(50)
            ,'content' => $this->faker->realText(1000)
            ,'img' => Arr::random($arrImg)
        ];
    }
}
