<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\todo;

class todos_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param=[
            'contents'=>'英語',
            'tag_id' =>2,
            'user_id' =>1
        ];
        todo::create($param);

        $param=[
            'contents'=>'数学',
            'tag_id' =>2,
            'user_id' =>2
        ];
        todo::create($param);

        $param=[
            'contents'=>'サッカー',
            'tag_id' =>3,
            'user_id' =>1
        ];
        todo::create($param);
    }
}
