<?php

class UserTableSeeder extends Seeder
{
        public function run()
        {
            $user = new User();
            $user->first_name = 'Sylvain';
            $user->last_name = 'Clavieres';
            $user->email = 'talkingtreefarm@yahoo.com';
            $user->password= 'qwerty123';
            $user->role_id = User::ADMIN;
            $user->save();
            
            $user = new User();
            $user->first_name = 'Sarah';
            $user->last_name = 'Clavieres';
            $user->email = 'sarahnord23@yahoo.com';
            $user->password= 'qwerty321';
            $user->role_id = User::ADMIN;
            $user->save();

            $user = new User();
            $user->first_name = 'Testuser';
            $user->last_name = 'Holzendorf';
            $user->email = 'Testh@gmail.com';
            $user->password= 'testuser';
            $user->role_id = User::STANDARD;
            $user->save();
        }
}
