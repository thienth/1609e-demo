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
    	$user = App\User::find(1);
    	$user->name = "HungDV";
    	$user->password = Hash::make("secret");
    	$user->save();
        // $users = [
        // 	["name" => "admin", "email" => "admin@imdev.vn", "password" => Hash::make("123456")],
        // 	["name" => "thienth", "email" => "thienth@gmail.com", "password" => Hash::make("123456")],
        // ];
        // foreach ($users as $value) {
        // 	DB::table('users')->insert($value);
        // }

    }
}
