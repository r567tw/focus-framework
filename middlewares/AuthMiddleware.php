<?php

namespace app\middlewares;

use r567tw\focus\core\Application;
use r567tw\focus\exceptions\ForbiddenException;
use r567tw\focus\middlewares\BaseMiddleware;

class AuthMiddleware extends BaseMiddleware
{
    public function __construct(array $methods = [])
    {
        $this->actions = $methods;
    }

    public function next()
    {
        // $auth = Application::$app->request->header("Authorization");
        $body = Application::$app->request->body();

        // in array 這裡可以在改善原本 focus 的 logic , 類似使用某一個function 裝 next() 以及處理其他
        if (!array_key_exists("auth",$body)){
            throw new ForbiddenException();
        }
    }
}
