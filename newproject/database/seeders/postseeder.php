<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Str;

class postseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        post::create(['title'=>'demo',
           'sub_title'=>'sub-title',
           'description'=>'demo',
           'slug'=>Str::slug('demo'),
        ]);
    }
}
