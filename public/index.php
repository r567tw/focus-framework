<?php

require_once __DIR__."/../vendor/autoload.php";

use app\controllers\MainController;
use app\controllers\AuthController;
use r567tw\focus\core\Application;
use app\models\User;

// $dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
// $dotenv->load();

// $config = [
//     'userClass' => User::class,
//     'db' => [
//         'dsn' => $_ENV['DB_DSN'],
//         'user' => $_ENV['DB_USER'],
//         'password' => $_ENV['DB_PASSWORD']
//     ]
// ];

$app = new Application(dirname(__DIR__));

$app->on(Application::EVENT_BEFORE_REQUEST,function(){
    $time = date("F j, Y, g:i a");
    file_put_contents('.././logs/hello.log', "{$time} before request\n", FILE_APPEND);
});

$app->on(Application::EVENT_AFTER_REQUEST,function(){
    $time = date("F j, Y, g:i a");
    file_put_contents('.././logs/hello.log', "{$time} after request\n", FILE_APPEND);
});

$app->router->get('/',[MainController::class,'home']);
$app->router->get('/contact', [MainController::class, 'contact']);

$app->router->get('/hello', 'helloworld');

$app->router->get('/jk',function(){
    return json_encode(['xxxx'=>'yyy']);
});

$app->router->get('/profile', [AuthController::class, 'profile']);
$app->router->get('/noprofile', [AuthController::class, 'profilenoAuth']);


$app->run();