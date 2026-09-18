<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Register Language Lines
    |--------------------------------------------------------------------------
    |
    | ...
    |
    */

    'title' => 'Sign Up',
    'heading' => 'Sign Up',
    'description' => 'Sign up your ' . config('app.name') . ' account to access all services.',
    'form' => [
        'input' => [
            'email' => 'Email',
            'password' => 'Password',
            'password_confirmation' => 'Password confirmation',
        ],
        'button' => 'Sign Up',
    ],
    'login' => [
        'description' => 'Do you already have a ' . config('app.name') . ' account?',
        'link' => 'Sign In',
    ],
    'status' => [
        'registered' => 'Your account has been created!',
    ],

];
