<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Tag;

class tags_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param=[
            'tags'=>'家事'
        ];
        Tag::create($param);

        $param=[
            'tags'=>'勉強'
        ];
        Tag::create($param);

        $param=[
            'tags'=>'運動'
        ];
        Tag::create($param);

        $param=[
            'tags'=>'食事'
        ];
        Tag::create($param);

        $param=[
            'tags'=>'移動'
        ];
        Tag::create($param);
    }
}
