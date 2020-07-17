<?php
date_default_timezone_set('Europe/Paris');
return [
    'settings' => [
        // comment this line when deploy to production environment
        'displayErrorDetails' => true,
        // View settings
        'view' => [
            'template_path' => __DIR__ . '/templates',
            'twig' => [
//                'cache' => __DIR__ . '/../cache/twig',
                'debug' => true,
                'auto_reload' => true,
            ],
        ],

        // doctrine settings
        'doctrine' => [
            'meta' => [
                'entity_path' => [
                    __DIR__ . '/src/models'
                ],
                'auto_generate_proxies' => true,
                //'proxy_dir' =>  'C:\Users\Nicolas Durand\Documents\BPGO\Proxie',
                'proxy_dir' =>  __DIR__.'/../cache/proxies',
                'cache' => null,
            ],
            'connection' => [
                'driver'   => 'pdo_sqlsrv',
                'host'     => '192.168.0.20',
                'port'     => '1433',
                'dbname'   => 'BANQUE_POPULAIRE',
                'user'     => 'sa',
                'password' => 'sa',
            ]
        ],

        // monolog settings
        'logger' => [
            'name' => 'app',
            //'path' =>  'C:/Users/Nicolas Durand/Documents/BPGO/app.log',
            'path' => __DIR__ . '/../log/app.log',
        ],
    ],
];
