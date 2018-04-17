<?php

use Illuminate\Database\Seeder;
use App\Models\Auth\Tag;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('tags')->insert([
        [
         'tag_name' => "aku cinta indonesia",
         'created_at' => date('Y-m-d H:i:s'),
         'updated_at' => date('Y-m-d H:i:s'),
       ],
       [
        'tag_name' => "aku adalah aku",
        'created_at' => date('Y-m-d H:i:s'),
        'updated_at' => date('Y-m-d H:i:s'),
      ],
      [
       'tag_name' => "cinta gila",
       'created_at' => date('Y-m-d H:i:s'),
       'updated_at' => date('Y-m-d H:i:s'),
     ],
     ]);
    }
}
