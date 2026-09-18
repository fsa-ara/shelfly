<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Email Verification Language Lines
    |--------------------------------------------------------------------------
    |
    | ...
    |
    */

    'title' => 'Email Verification',
    'heading' => 'Email Verification',
    'description' => 'Please click the link emailed to you to verify your ' . config('app.name') . ' account.',
    'form' => [
        'button' => 'Resend',
    ],
    'status' => [
        'verified' => 'Your account has been verified!',
        'already_verified' => 'Your account has already been verified!',
        'resent' => 'The verification link has been resent!',
    ],
    'error' => [
        'throttle' => 'Too many attempts to resend the verification email. Please wait before trying again.',
    ],

];
