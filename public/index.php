<?php

require_once __DIR__."/../vendor/autoload.php";

use app\controllers\MainController;
use app\controllers\AuthController;
use r567tw\focus\core\Application;
use app\models\User;

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
$app->router->get('/test',[MainController::class,'test']);
$app->router->get('/contact', [MainController::class, 'contact']);
$app->router->get('/redirect', [MainController::class, 'red']);

$app->router->get('/hello', 'helloworld');

$app->router->get('/json',function(){
    return json_encode(['xxxx'=>'yyy']);
});

$app->run();