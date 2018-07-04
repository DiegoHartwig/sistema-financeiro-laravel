<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'      => 'Diego Hartwig',
            'email'     => 'hartwig.diego@gmail.com',
            'password'  => bcrypt('sistema'), 
        ]);

        User::create([
            'name'      => 'Aline Cardoso',
            'email'     => 'aline@gmail.com',
            'password'  => bcrypt('sistema'), 
        ]);
    }
}
