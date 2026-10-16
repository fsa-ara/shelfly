<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Email Verification Page Language Lines
    |--------------------------------------------------------------------------
    |
    | ...
    |
    */

    'title' => 'Email verification',
    'heading' => 'Email verification',
    'description' => [
        'subtitle' => 'A verification email has been sent to your inbox. Please click the link to verify your :app account.',
    ],
    'button' => [
        'submit' => 'Send',
    ],
    'status' => [
        'success' => [
            'sent' => 'The verification link has been sent!',
            'verified' => 'Your account has been verified!',
        ],
    ],
    'error' => [
        'throttle' => 'Too many attempts to resend the verification email. Please wait before trying again.',
        'invalid_signature' => 'The verification link is no longer valid. Please request a new verification email.',
    ],

];
