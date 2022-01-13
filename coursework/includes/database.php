<?php


function database_connect(): PDO
{
    // Хост:        db
    // Порт:        3306
    // База данных: app
    // Кодировка:   utf8
    $source = 'mysql:host=db;port=3306;dbname=app;charset=utf8';

    $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false,
    ];

    return new PDO($source, 'app', 'app', $options);
}