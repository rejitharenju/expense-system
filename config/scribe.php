<?php

return [

    /*
     * Whether to use translation strings from your `resources/lang` directory.
     */
    'use_translation' => false,

    /*
     * The base URL of your API. This will be used in generated examples.
     */
    'base_url' => env('SCRIBE_BASE_URL', null),

    /*
     * The title of your API documentation.
     */
    'title' => env('SCRIBE_TITLE', 'API Documentation'),

    /*
     * The description of your API.
     */
    'description' => env('SCRIBE_DESCRIPTION', 'Generated API documentation'),

    /*
     * The routes you want to document.
     */
    'routes' => [
        [
            'match' => [
                'prefixes' => ['api/*'],
                'domains' => ['*'],
            ],
            'include' => [],
            'exclude' => [],
        ],
    ],
];
