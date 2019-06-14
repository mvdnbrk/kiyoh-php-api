<?php

return [

    /*
    |--------------------------------------------------------------------------
    | KiyOh Secret Hash
    |--------------------------------------------------------------------------
    |
    | Your secret hash to connect to the KiyOh endpoint.
    |
    */

    'secret' => env('KIYOH_SECRET'),

    /*
    |--------------------------------------------------------------------------
    | KiyOh Reviews Table
    |--------------------------------------------------------------------------
    |
    | Here you may define the table name to store your reviews in.
    |
    */

    'table_name' => 'kiyoh_reviews',

];
