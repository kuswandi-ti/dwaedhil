<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\User::Create([
            'name'              => 'administrator', 
            'username'          => 'admin', 
            'email'             => 'admin@mail.com', 
            'password'          => bcrypt('123456'), 
            'active'            => '1', 
            'user_created'      => 'admin', 
            'datetime_created'  => new DateTime(),
            'user_updated'      => 'admin', 
            'datetime_updated'  => new DateTime()
        ]);
    }
}
