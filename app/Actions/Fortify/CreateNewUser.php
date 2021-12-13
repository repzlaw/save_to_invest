<?php

namespace App\Actions\Fortify;

use App\Models\Course;
use App\Models\CreditScore;
use App\Models\ECash;
use App\Models\Training;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Spatie\Activitylog\Models\Activity;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {
        // dd($input['password_confirmation']);
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique(User::class),
            ],
            'password' => $this->passwordRules(),
        ])->validate();

        $user = User::create([
            'name' => $input['name'],
            'phone' => $input['phone'],
            'role_id' => 2,
            'image' => 'no_image.png',
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
        ]);

        $credit_score = CreditScore::create([
            'user_id' => $user->id,
            'value' => 1,
        ]);

        $courses = Course::create([
            'user_id' => $user->id,
            'value' => 1,
        ]);

        $training = Training::create([
            'user_id' => $user->id,
            'value' => 1,
        ]);

        $ecash = ECash::create([
            'user_id' => $user->id,
            'value' => 500000,
        ]);
        // activity()->log('Created your save to invest account 👍🏾');

        Activity::create([
            'description'=> 'Created your save2invest account  👏',
            'causer_id'=>$user->id,
            'properties'=>[],
            'log_name'=>'default',
            'causer_type'=>'App\Models\User',
        ]);

        return $user;
    }
}
