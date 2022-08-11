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
            'contents'=>'仕事'
        ];
        todo::create($param);

        $param=[
            'contents'=>'美容院'
        ];
        todo::create($param);
    }
}
