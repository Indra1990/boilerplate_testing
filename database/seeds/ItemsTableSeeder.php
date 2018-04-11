<?php


use Illuminate\Database\Seeder;
use App\Models\Auth\Item;
//use Faker\Factory as Faker;

class ItemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $faker = Faker\Factory::create();

      $limit = 30;

      for ($i = 0; $i < $limit; $i++) {
          DB::table('items')->insert([ //,
              'nama_barang' => $faker->name,
              'no_telp' => $faker->PhoneNumber,
          ]);
      }
    }

}
