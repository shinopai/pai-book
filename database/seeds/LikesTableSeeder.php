<?php

use Illuminate\Database\Seeder;
use App\Like;

class LikesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 0; $i < 30; $i++){
            Like::create([
                'user_id' => rand(1, 40),
                'book_id' => rand(1, 16)
            ]);
        }
    }
}
