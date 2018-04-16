<?php

use Illuminate\Database\Seeder;
use App\User;
class UsersTableSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\User::create([
            'name' => 'Ashar',
            'email' => '0ashar0786@gmail.com',
            'password' => bcrypt('aaaaaa')
        ]) ;
    }
}
