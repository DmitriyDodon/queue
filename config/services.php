<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'GitHub' => [
        'client_id' =>env('GITHUB_OAUTH_CLIENT_ID'),
        'redirect_uri'=>env('GITHUB_OAUTH_REDIRECT_URI'),
        'client_secret'=>env('GITHUB_OAUTH_CLIENT_SECRET'),
    ],


    'Spotify' => [
        'client_id' => env('SPOTIFY_OAUTH_CLIENT_ID'),
        'redirect_uri'=> env('SPOTIFY_OAUTH_REDIRECT_URI'),
        'client_secret'=> env('SPOTIFY_OAUTH_CLIENT_SECRET'),
    ],

    'IPSTACK' => [
        'access_key' => env('IPSTACK_ACCESS_KEY'),
    ],

];
