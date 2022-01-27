<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $arr = [
            'IT',
            'ビジネス',
            'デザイン',
            '自己啓発',
            '趣味',
            'スポーツ',
            '観光',
            'カフェ'
        ];

        for ($i=0; $i < count($arr); $i++) {
            Category::create([
                'name' => $arr[$i]
            ]);
        }
    }
}
