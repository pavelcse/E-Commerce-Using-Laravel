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
        $user = App\User::create([
            'name' => 'Pavel Parvej',
            'email' => 'admin@example.com',
            'password' => bcrypt('pavel007'),
            'avatar' => 'uploads/avatar/1.png',
            'admin' => 1
        ]);
    }
}
