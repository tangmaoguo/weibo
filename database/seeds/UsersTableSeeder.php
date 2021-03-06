<?php

use Illuminate\Database\Seeder;
use App\Models\User;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class,50)->create();
        $user = User::find(1);
        $user->name = 'tangmaoguo117';
        $user->email = 'tangmaoguo117@gmail.com';
        $user->password = bcrypt('123123');
        $user->activation_token = null;
        $user->activated = true;
        $user->is_admin = true;

        $user->save();

    }
}
