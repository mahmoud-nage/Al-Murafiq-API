<?php

use Illuminate\Database\Seeder;
use App\User;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder {

	public function run()
	{
		//DB::table('users')->delete();

		// SuperAdmin
		User::create(array(
				'name' => 'SuperAdmin',
				'userable_id' => 1,
				'userable_type' => 'App\General\Admin',
				'email' => 'SuperAdmin@mail.com',
				'password' => Hash::make('123456')
			));
	}
}
