<?php
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	
        $users = [
        	["username" => "admin", "email" => "admin@gmail.com", "password_hash" => Hash::make("123456")],
        	["username" => "mod", "email" => "mod@gmail.com", "password_hash" => Hash::make("123456")],
        ];
        foreach ($users as $value) {
        	DB::table('users')->insert($value);
        }

    }
}
