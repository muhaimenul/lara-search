<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Default Searching Configuration Name
    |--------------------------------------------------------------------------
    |
    | LaraSearch provides different searching configuration/operation
    | for searching eloquent model. Here you may define a default searching
    | configuration. Currently 'like' and 'fulltext' types are available.
    | More configurations and algorithm will be introduces in future.
    */

    'formula' => env('LARA_SEARCH_TYPE', 'like'),

    /*
    |--------------------------------------------------------------------------
    | Default Queue Connection Name
    |--------------------------------------------------------------------------
    |
    | Laravel's queue API supports an assortment of back-ends via a single
    | API, giving you convenient access to each back-end using the same
    | syntax for every one. Here you may define a default connection.
    | Queue feature for LaraSearch is not published yet.
    */
    // 'queue' => env('LARA_SEARCH_QUEUE', 'false'),

];
