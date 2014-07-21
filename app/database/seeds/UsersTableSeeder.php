<?php

class UsersTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
    $user = new User();
    $user->username = 'thisiskaden';
    $user->email    = 'thisiskaden@gmail.com';
    $user->nickname    = '케이든';
    $user->password = Hash::make('admin123');
    $user->save();
	}

}