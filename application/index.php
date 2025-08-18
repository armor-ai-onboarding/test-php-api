<?php

// autoloader for Composer
require 'vendor/autoload.php';

// instanciate Slim
$app = new Slim\App();

// basic authentication
$app->add(new \Slim\Middleware\HttpBasicAuthentication(array(
    // everything inside this root path uses the authentication
    "path" => "/api",
    // deactivate HTTPS usage (for simplicity)
    "secure" => false,
    // users (name and password), credentials will be passed via request header, see the client.html for more info
    "users" => [
        "demouser" => "123",
    ],
    "error" => function ($request, $response, $arguments) {
        // return the 401 "unauthorized" status code when auth error occurs
        return $response->withStatus(401);
    }
)));


$app->run();
