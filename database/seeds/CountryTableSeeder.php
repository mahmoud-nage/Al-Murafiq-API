<?php

use Illuminate\Database\Seeder;
use App\General\Country;

class CountryTableSeeder extends Seeder {

	public function run()
	{
		//DB::table('countries')->delete();

		// DefaultCountrySeed
		Country::create(array(
				'name_ar' => 'مصر',
				'name_en' => 'Egypt',
				'active' => 1,
				'default' => 1,
				'currency_id' => 63,
				'icon' => 'null'
			));
	}
}