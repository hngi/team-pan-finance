<?php

use Illuminate\Database\Seeder;
use App\Admin;

class AdminsTableDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
           // check if table users is empty
        if(DB::table('admins')->get()->count() == 0){

            DB::table('admins')->insert([

                [
                    'first_name' => 'Administrator',
                    'last_name' => 'Team',
                    'email' => 'admin@fintrack.com',
                    'password' => bcrypt('password'),
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'first_name' => 'Pan',
                    'last_name' => 'Admin',
                    'email' => 'panadmin@fintrack.com',
                    'password' => bcrypt('password'),
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ]
            ]);

        } 
    }
}
