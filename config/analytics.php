<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Enable Google Analytics
    |--------------------------------------------------------------------------
    |
    | This defines if Google Analytics is enabled.
    |
    | Requires a valid Google Analytics Tracking ID.
    |
    | Default to false.
    |
    */

    'google' => env('GA_ENABLE', false),

    /*
    |--------------------------------------------------------------------------
    | Google Analytics Tracking ID
    |--------------------------------------------------------------------------
    |
    | This defines the Google Analytics Tracking ID to use.
    |
    | Default to 'UA-XXXXXXXX-X'.
    |
    */

    'googleid' => env('GA_ID', 'UA-XXXXXXXX-X'),

];
