<?php

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

/*
|--------------------------------------------------------------------------
| Initial User Seed Data
|--------------------------------------------------------------------------
|
| Here you may set the user information details for the application
| administrator. Don't worry, you can always edit these
| details within the application.
|
*/
class UsersTableSeeder extends Seeder
{
    /**
     * Run the User model database seed.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();

        DB::table('users')->insert([
            /*
            |--------------------------------------------------------------------------
            | Summary
            |--------------------------------------------------------------------------
            */
            'bio'           => 'A short description of yourself is a great way for people to get to know you!',

            /*
            |--------------------------------------------------------------------------
            | Basic Information
            |--------------------------------------------------------------------------
            */
            'first_name'    => 'anima',
            'last_name'     => 'flower',
            'display_name'  => 'anima',
            'job'           => 'Web Developer',
            'gender'        => 'Male',
            'birthday'      => '1993-02-07',
            'relationship'  => 'Single',

            /*
            |--------------------------------------------------------------------------
            | Contact Information
            |--------------------------------------------------------------------------
            */
            'phone'         => '13193300102',
            'email'         => '872930297@qq.com',
            'twitter'       => 'animaflower',      // Example: https://twitter.com/username
            'facebook'      => 'animaflower',      // Example: https://facebook.com/username
            'github'        => 'animaflower',      // Example: https://github.com/username
            'address'       => '陕西西安',
            'city'          => '西安',
            'country'       => 'china',

            /*
            |--------------------------------------------------------------------------
            | Misc Information
            |--------------------------------------------------------------------------
            */
            'url'           => 'www.animaflower.com',
            'password'      => bcrypt('admin888'),

            /*
            |--------------------------------------------------------------------------
            | Timestamps
            |--------------------------------------------------------------------------
            */
            'created_at'    => Carbon\Carbon::now(),
            'updated_at'    => Carbon\Carbon::now(),
        ]);
    }
}
