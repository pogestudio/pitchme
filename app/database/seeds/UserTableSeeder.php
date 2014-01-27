<?php
 
class UserTableSeeder extends Seeder {
 
    public function run()
    {
        DB::table('users')->delete();
 
        User::create(array(
            'email' => 'ca@pitch.xxx',
            'password' => Hash::make('adminpassword'),
            'fname' => 'Best Admin',
            'lname' => 'Ever in the world',
            'role' => 'admin',
            'accepted_terms' => true
        ));

                User::create(array(
            'email' => 'email@email.com',
            'password' => Hash::make('first_password'),
            'fname' => 'Hulk',
            'lname' => 'Hogan',
            'accepted_terms' => true
        ));
 
        User::create(array(
            'email' => 'secondUser@email.com',
            'password' => Hash::make('second_password'),
            'fname' => 'Tony',
            'lname' => 'Stark',
            'accepted_terms' => true
        ));

        User::create(array(
            'email' => 'vc@vc.vc',
            'password' => Hash::make('vc'),
            'role' => 'vc',
            'fname' => 'First_name',
            'lname' => 'Last_name',
            'accepted_terms' => true
        ));

        User::create(array(
            'email' => 'p1@p.p',
            'password' => Hash::make('p'),
            'role' => 'panel',
            'fname' => 'First_name',
            'lname' => 'Last_name',
            'accepted_terms' => true
        ));

        User::create(array(
            'email' => 'p2@p.p',
            'password' => Hash::make('p'),
            'role' => 'panel',
            'fname' => 'First_name',
            'lname' => 'Last_name',
            'accepted_terms' => true
        ));

        User::create(array(
            'email' => 'p3@p.p',
            'password' => Hash::make('p'),
            'role' => 'panel',
            'fname' => 'First_name',
            'lname' => 'Last_name',
            'accepted_terms' => true
        ));

        User::create(array(
            'email' => 'p4@p.p',
            'password' => Hash::make('p'),
            'role' => 'panel',
            'fname' => 'First_name',
            'lname' => 'Last_name',
            'accepted_terms' => true
        ));

        User::create(array(
            'email' => 'p5@p.p',
            'password' => Hash::make('p'),
            'role' => 'panel',
            'fname' => 'First_name',
            'lname' => 'Last_name',
            'accepted_terms' => true
        ));

        User::create(array(
            'email' => 'p6@p.p',
            'password' => Hash::make('p'),
            'role' => 'panel',
            'fname' => 'First_name',
            'lname' => 'Last_name',
            'accepted_terms' => true
        ));

    }
 
}