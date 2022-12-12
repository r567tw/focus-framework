<?php
namespace app\controllers;

use r567tw\focus\core\Application;
use r567tw\focus\core\Controller;
use r567tw\focus\core\Request;
use r567tw\focus\core\Response;
use app\middlewares\AuthMiddleware;

class MainController extends Controller
{
    public function __construct()
    {
        $this->registMiddleWare(new AuthMiddleware(['contact']));
    }

    public function contact()
    {
        return $this->jsonFromFile(dirname(__DIR__)."/jsons/sample.json");
    }

    public function home(Request $req)
    {
        return (new Response())->json($req->body());
    }

    public function res()
    {
        return (new Response())->redirect('/');
    }
}