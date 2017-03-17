<?php

use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
        	["role_name" => "admin"],
        	["role_name" => "moderator"],
        	["role_name" => "author"],
        	["role_name" => "member"],
        ];
        foreach ($roles as $value) {
        	DB::table('roles')->insert($value);
        }
    }
}
