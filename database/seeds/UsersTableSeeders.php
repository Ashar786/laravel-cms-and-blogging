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
        $user = App\User::create([
            'name' => 'Ashar',
            'email' => '0ashar0786@gmail.com',
            'password' => bcrypt('aaaaaa'),
            'admin' => 1
        ]) ;

        App\Profile::create([
            'user_id' => $user->id,
            'avatar' => 'uploads/avatar/1.png',
            'about' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Excepturi fuga quaerat quod veniam? Ab architecto cum dignissimos dolore eaque, earum facere harum labore maiores odit officiis omnis quia recusandae saepe.',
            'facebook' => 'www.fb.com/ashar786786',
            'youtube' => 'wwww.youtube.com'
        ]) ;


    }
}
