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
     * Panel Navigation
     * Accepts: boolean OR array of panel ID with boolean
     * If array is empty, assumes to not display navigation item.
     *
     * Panel Example:
     *  'panel_navigation' => ['admin' => TRUE];
     */
    'panel_navigation' => true,

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
     *
     * EG: ['en','ar'] will provide English and Arabic options.
     *
     * Default: NULL, provides English and Arabic options.
     */
    'locals' => null,
];
