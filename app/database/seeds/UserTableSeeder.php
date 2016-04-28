<?php

class UserTableSeeder extends Seeder
{
        public function run()
        {


            $user1 = new User();
            $user1->first_name = 'Sylvain';
            $user1->last_name = 'Clavieres';
            $user1->email = 'Sylvain@gmail.com';
            $user1->password= 'qwerty123';
            $user1->role_id = User::ADMIN;
            $user1->save();

            $user2 = new User();
            $user2->first_name = 'Sarah';
            $user2->last_name = 'Clavieres';
            $user2->email = 'Sarah@gmail.com';
            $user2->password= 'qwerty321';
            $user2->role_id = User::ADMIN;
            $user2->save();
        }
}
