<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\User;
use Carbon\Carbon;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
		
		$users = User::all()->pluck('id')->toArray();
		
		foreach (range(1,10) as $index) {
			DB::table('users')->insert([
				'id' => $faker->unique()->numberBetween($min = 1, $max = 9999),
				'name' => $faker->firstName,
				'email' => $faker->unique()->email,
				'role' => $faker->numberBetween(0,1),
				'password' => Hash::make($faker->word),
				'created_at' => Carbon::now()->toDateTimeString(),
				'updated_at' => Carbon::now()->toDateTimeString()
				]);
		}
	}			
}
?>