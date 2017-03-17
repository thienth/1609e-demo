<?php

use Illuminate\Database\Seeder;

class UserRoleXrefTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $userRoles = [
        	["user_id" => 1, "role_id" => 1],
        	["user_id" => 2, "role_id" => 2],
        	["user_id" => 2, "role_id" => 4],
        ];
        foreach ($userRoles as $value) {
        	DB::table('user_role_xref')->insert($value);
        }
    }
}
