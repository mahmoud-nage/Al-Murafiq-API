<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder {

	public function run()
	{
		Model::unguard();

		$this->call('CountryTableSeeder');
		$this->command->info('Country table seeded!');

		$this->call('UserTableSeeder');
		$this->command->info('User table seeded!');

		$this->call('RolesAndPermissionsSeeder');
		$this->command->info('RolesAndPermissions table seeded!');
	}
}