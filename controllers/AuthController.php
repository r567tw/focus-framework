<?php

namespace app\controllers;

use r567tw\focus\core\Controller;
use app\middlewares\AuthMiddleware;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->registMiddleWare(new AuthMiddleware(['profile']));
    }

    public function profile()
    {
        return $this->json('profile');
    }

    public function profilenoAuth()
    {
        return $this->json('profile not need auth');
    }
}
