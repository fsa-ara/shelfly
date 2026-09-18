<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Login Language Lines
    |--------------------------------------------------------------------------
    |
    | ...
    |
    */

    'title' => 'Sign In',
    'heading' => 'Sign In',
    'description' => 'Sign in to your ' . config('app.name') . ' account to access all services.',
    'form' => [
        'input' => [
            'email' => 'Email',
            'password' => 'Password',
            'remember_me' => 'Remember me',
        ],
        'button' => 'Sign In',
    ],
    'forgot_password' => [
        'link' => 'Forgot your password?',
    ],
    'register' => [
        'description' => "Don't have a " . config('app.name') . ' account?',
        'link' => 'Create your ' . config('app.name') . ' account',
    ],
    'status' => [
        'logged_in' => 'You are logged in!',
    ],
    'error' => [
        'credentials' => 'Invalid email or password.',
    ],

];
