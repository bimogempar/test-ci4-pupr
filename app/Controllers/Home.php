<?php

namespace App\Controllers;

use App\Models\Car;

class Home extends BaseController
{
    public function index()
    {
        $carModel = new Car();
        try {
            $cars = $carModel->getCarJoinCategory();
            return view('home', ['cars' => $cars]);
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
}
