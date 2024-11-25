<?php

return [
    /**
     * Type API Middelware
     *
     * Set the middleware for the API of Types it can be empty if you need it public
     */
    'middleware' => ['auth:sanctum'],

    /**
     * Types API Resource
     *
     * If you need to use a resource for the API of Types you can set it here
     */
    'types_resource' => null,

    /**
     * Show Navigation Menu
     *
     * If you need to show the navigation menu for the types
     */
    'show_navigation' => true,

    /**
     * Empty State
     *
     * If type Column is Empty Put This Message
     */
    'empty_state' => null,

    /**
     * Locals
     *
     * If you need to use locals for the types you can set it here
     */
    'locals' => [
        'ar' => [
            'ar' => 'العربية',
            'en' => 'Arabic',
        ],
        'en' => [
            'ar' => 'الإنجليزية',
            'en' => 'English',
        ],
    ],
];
