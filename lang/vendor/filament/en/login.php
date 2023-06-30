<?php

return [

    'title' => '',

    'heading' => 'Sign in to your account',

    'buttons' => [

        'submit' => [
            'label' => 'Sign in',
        ],

    ],

    'fields' => [

        'email' => [
            'label' => 'Admin Email address',
        ],

        'password' => [
            'label' => 'Password',
        ],

        'remember' => [
            'label' => 'Remember me',
        ],

    ],

    'messages' => [
        'failed' => 'These credentials do not match our records.',
        'throttled' => 'Too many login attempts. Please try again in :seconds seconds.',
    ],

];
