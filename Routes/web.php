<?php

use Src\Routing\Route;


Route::get('/', function () {
    echo 'Hello, world!';
});

Route::get('/about', function () {
    echo 'About Us';
});


Route::get('/user/{id}/{name}', function ($id, $name) {
    echo 'User ID: ' . htmlspecialchars($id) . ', Name: ' . htmlspecialchars($name);
});
