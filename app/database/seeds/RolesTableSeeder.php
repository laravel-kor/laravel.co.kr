<?php

class RolesTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
    $role_super = new Role();
    $role_super->name = 'super';
    $role_super->save();
    
    $role_admin = new Role();
    $role_admin->name = 'admin';
    $role_admin->save();
    
    $role_member = new Role();
    $role_member->name = 'member';
    $role_member->save();
    
    User::find(1)->roles()->attach(1);
	}

}