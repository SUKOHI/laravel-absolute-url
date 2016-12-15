# laravel-absolute-url
A Laravel package to generate absolute URL.

# Installation

Execute the following composer command.

    composer require sukohi/laravel-absolute-url:1.*

Register the service provider in app.php

    'providers' => [
        ...Others...,  
        Sukohi\LaravelAbsoluteUrl\LaravelAbsoluteUrlServiceProvider::class, 
    ]

Also alias

    'aliases' => [
        ...Others...,  
        'LaravelAbsoluteUrl' => Sukohi\LaravelAbsoluteUrl\Facades\LaravelAbsoluteUrl::class
    ]
    
# Usage

    // 1. Set Base URL

    $base_url = 'http://example.com/1/2/3/';
    $absolute_path = \LaravelAbsoluteUrl::baseUrl($base_url);

    // 2. Get Absolute URL

    echo $absolute_path->get('/test.html');  // http://example.com/test.html
    echo $absolute_path->get('../test.html');  // http://example.com/1/2/test.html
    echo $absolute_path->get('./test.html');  // http://example.com/1/2/3/test.html
    echo $absolute_path->get('test.html');  // http://example.com/1/2/3/test.html

# License

This package is licensed under the MIT License.

Copyright 2016 Sukohi Kuhoh