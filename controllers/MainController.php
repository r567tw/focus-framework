<?php
namespace app\controllers;

use r567tw\focus\core\Application;
use r567tw\focus\core\Controller;
use r567tw\focus\core\Request;

class MainController extends Controller
{

    // public function handle(Request $request)
    // {
    //     $body = Application::$app->request->body();
    //     return $this->render('result',[
    //         'name' => $body['name'],
    //         'message' => $body['message']
    //     ]);
    // }

    public function contact()
    {
        return $this->jsonFromFile(dirname(__DIR__)."/jsons/sample.json");
    }

    public function home()
    {
        return $this->json(['key' => 'Hello API']);
    }
}