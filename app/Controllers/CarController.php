<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Car;

class CarController extends BaseController
{
    public function index()
    {
        return 'index car controller';
    }

    public function getCar()
    {
        try {
            $carModel = new Car();
            $cars = $carModel->getCarJoinCategory();
            dd($cars);
            return $cars;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
