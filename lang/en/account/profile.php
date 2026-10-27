<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Profile Page Language Lines
    |--------------------------------------------------------------------------
    |
    | ...
    |
    */

    'title' => 'Profile',
    'heading' => 'Profile',
    'description' => [
        'subheading' => 'Manage your personal information and account security.',
    ],
    'tab' => [
        'label' => 'Profile tabs',
        'button' => [
            'information' => 'Information',
            'security' => 'Security',
        ],
    ],
    'button' => [
        'submit' => [
            'information' => 'Update',
            'security' => 'Update',
            'delete' => 'Yes, delete',
        ],
    ],
    'input' => [
        'label' => [
            'username' => 'Enter your username',
            'current_password' => 'Enter your current password',
            'password' => 'Enter your new password',
            'password_confirmation' => 'Confirm your new password',
        ],
    ],
    'select' => [
        'label' => [
            'locale' => 'Select your language',
        ],
    ],
    'modal' => [
        'button' => [
            'show' => 'Delete your account',
            'close' => 'No, keep it',
        ],
        'heading' => 'Delete your account',
        'question' => 'Are you sure?',
        'warning' => 'This action cannot be undone!',
    ],
    'status' => [
        'success' => [
            'information_updated' => 'Your information has been updated!',
            'password_updated' => 'Your password has been updated!',
            'account_deleted' => 'Your account has been deleted!',
        ],
    ],
    'error' => [
        'password' => 'Your new password must be different from your current password.',
    ],

];
