<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Admin::create(
            [
                'name' => '管理员',
                'email' => '253120625@qq.com',
                'password' => sha1('123456')
            ]
        );
       // $this->call(UsersTableSeeder::class);
    }
}
