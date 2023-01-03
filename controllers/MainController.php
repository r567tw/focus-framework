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
        return response()->file(dirname(__DIR__)."/jsons/sample.json");
    }

    public function home(Request $req)
    {
        return response()->json(["hello"=> "world"]);
    }

    public function redirect()
    {
        return response()->redirect('https://tw.yahoo.com');
    }
}