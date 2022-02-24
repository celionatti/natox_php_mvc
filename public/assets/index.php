<?php

use natoxCore\Application;
use natox\controllers\SiteController;

require __DIR__ . '/../vendor/autoload.php';
$dotenv = \Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();

$app = new Application(dirname(__DIR__));

$app->on(Application::EVENT_BEFORE_REQUEST, function () {
    // echo "Before request from second installation";
});


$app->router->get('/', [SiteController::class, 'home']);
$app->router->get('/login', [SiteController::class, 'login']);
$app->router->get('/login/{id}', [SiteController::class, 'login']);

$app->run();