<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->truncate();//avoid duplicates
        DB::table('users')->insert([
        	'name'=>'tumusiime mpoza',
        	'email'=>'admin@admin.com',
        	'user_type'=>'admin',
        	'password'=>Hash::make('admin123'),
        ]);

          DB::table('users')->insert([
        	'name'=>'Pricilla Pricilla',
        	'email'=>'pricilla@gmail.com',
        	'user_type'=>'ware_house',
        	'password'=>Hash::make('ware_house123'),
        ]);
          DB::table('users')->insert([
        	'name'=>'Elizabeth Naka',
        	'email'=>'elizabeth@admin.com',
        	'user_type'=>'admin',
        	'password'=>Hash::make('admin123'),
        ]);
          DB::table('users')->insert([
          'name'=>'Elizabeth A',
          'email'=>'elizabeth@farmer.com',
          'user_type'=>'farmer',
          'password'=>Hash::make('farmer123'),
        ]);
           DB::table('users')->insert([
          'name'=>'Pricilla A',
          'email'=>'pricilla@warehouse.com',
          'user_type'=>'ware_house',
          'password'=>Hash::make('ware_house123'),
        ]);
    }
}
