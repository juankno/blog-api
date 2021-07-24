<?php

use App\User;
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
        factory(User::class)->create(['name' => 'Juankno', 'email' => 'juan@mail.com']);
        factory(User::class)->times(10)->create();
    }
}
