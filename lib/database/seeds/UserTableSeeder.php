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
        //
        $data=[
        	[
        		'email'=>'khanhvinh@gmail.com',
        		'password'=>bcrypt('123456'),
        		'level'=>1
        	],
        	[
        		'email'=>'khanhvinh2@gmail.com',
        		'password'=>bcrypt('123456'),
        		'level'=>2
        	],
        ];
        DB::table('vp_user')->insert($data);
    }
}
