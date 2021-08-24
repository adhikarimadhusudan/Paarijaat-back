<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User;
        $user->firstname = config('app.default_firstname');
        $user->lastname = config('app.default_lastname');
        $user->username = config('app.default_username');
        $user->password = Hash::make(config('app.default_password'));
        $user->profile = config('app.default_profile');
        $user->save();

    }
}
