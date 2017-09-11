<?php

// Doctrine (db)
$app['db.options'] = array(
    'driver'   => 'pdo_mysql',
    'charset'  => 'utf8',
    'host'     => 'localhost',  // Mandatory for PHPUnit testing
    'port'     => '3306',
    'dbname'   => 'bakery',
    'user'     => 'root',
    'password' => '',
);

// enable the debug mode
$app['debug'] = true;

// define log parameters
$app['monolog.level'] = 'INFO';
