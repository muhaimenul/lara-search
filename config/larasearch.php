<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Default Queue Connection Name
    |--------------------------------------------------------------------------
    |
    | Laravel's queue API supports an assortment of back-ends via a single
    | API, giving you convenient access to each back-end using the same
    | syntax for every one. Here you may define a default connection.
    |
    */

    'formula' => env('LARA_SEARCH_TYPE', 'fts'),

    'queue' => env('LARA_SEARCH_QUEUE', 'false'),

];
