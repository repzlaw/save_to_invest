<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = array(
            array(
                'email' => 'admin@lifecard.com',
                'phone' => '08134551968',
                'name' => 'lifecard invest',
                'role_id' => 1,
                'password' => bcrypt('12345678'),
            ),
            array(
                'email' => 'user@lifecard.com',
                'phone' => '08134551969',
                'name' => 'user test',
                'role_id' => 2,
                'password' => bcrypt('12345678'),
            )
        );

        foreach ($admin as $value) {
            $user = User::updateOrCreate($value);
        }
    }
}
