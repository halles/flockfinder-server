<?php

return [

    'fetch' => PDO::FETCH_CLASS,

    'default' => env('DB_CONNECTION', 'mongodb'),

    'connections' => [

        'mongodb' => array(
            'driver'   => getenv('DB_CONNECTION'),
            'host'     => getenv('DB_HOST'),
            'port'     => getenv('DB_PORT'),
            'username' => getenv('DB_USERNAME'),
            'password' => getenv('DB_PASSWORD'),
            'database' => getenv('DB_DATABASE'),
            'options' => array(
                'db' => 'admin' // sets the authentication database required by mongo 3
            )
        ),

    ]

];
