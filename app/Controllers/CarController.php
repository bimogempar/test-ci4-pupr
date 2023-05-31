<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\API\ResponseTrait;
use App\Models\Car;

class CarController extends BaseController
{
    use ResponseTrait;
    public function getAllCar()
    {
        $carModel = new Car();
        $cars = $carModel->getCarJoinCategory();
        return $this->respond([
            "message" => "Success get all cars",
            "data" => $cars
        ], 200);
    }
}
