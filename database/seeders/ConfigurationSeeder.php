<?php

namespace Database\Seeders;

use App\Models\Configuration;
use Illuminate\Database\Seeder;

class ConfigurationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $setting = array(
            array(
                'key' => 'pay_stack_secret',
                'value' => null,
            ),
            array(
                'key' => 'pay_stack_public',
                'value' => null,
            ),
            array(
                'key' => 'captcha_enable',
                'value' => 0,
            ),
            array(
                'key' => 'captcha_site_key',
                'value' => null
            ),
            array(
                'key' => 'captcha_secret_key',
                'value' => null
            ),
            array(
                'key' => 'captcha_site_key_v3',
                'value' => null
            ),
            array(
                'key' => 'captcha_secret_key_v3',
                'value' => null
            ),
            array(
                'key' => 'captcha_login',
                'value' => 0
            ),
            array(
                'key' => 'captcha_register',
                'value' => 0
            ),
        );

        foreach ($setting as $value) {
            $set = Configuration::updateOrCreate($value);
        }
    }
}
