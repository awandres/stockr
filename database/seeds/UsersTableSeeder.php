<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Stock;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      for ($i=0; $i < 100; $i++) {
        $user = User::create([
          'name' => 'User' . $i,
          'email' => 'User' . $i . '@stockr.com',
          'password' => bcrypt('password')
        ]);

        $user->portfolio->stocks()->attach(Stock::inRandomOrder()->first());

        $user->portfolio->save();
      }
    }
}
