<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\API\ResponseTrait;
use App\Models\Car;

class CarController extends BaseController
{
    protected $carModel;
    use ResponseTrait;

    public function __construct()
    {
        $this->carModel = new Car();
    }

    public function getAllCar()
    {
        $cars = $this->carModel->getCarJoinCategory();
        return $this->respond([
            "message" => "Success get all cars",
            "data" => $cars
        ], 200);
    }

    public function saveCar()
    {
        $reqBody = $this->request->getVar();
        $carId = $this->carModel->insert([
            'car_name' => $reqBody->car_name,
            'price' => $reqBody->price,
            'year' => $reqBody->year,
            // 'image_url' => $pathName,
            'description' => $reqBody->description,
            'category_id' => $reqBody->category_id,
        ]);
        $car = $this->carModel->findCarJoinCategory($carId);
        return $this->respond([
            "message" => "Success save car",
            "data" => $car
        ], 200);
    }

    public function updateCar($car_id)
    {
        $reqBody = $this->request->getVar();
        $this->carModel->update($car_id, [
            'car_name' => $reqBody->car_name,
            'price' => $reqBody->price,
            'year' => $reqBody->year,
            // 'image_url' => $pathName,
            'description' => $reqBody->description,
            'category_id' => $reqBody->category_id,
        ]);
        $car = $this->carModel->findCarJoinCategory($car_id);
        return $this->respond([
            "message" => "Success updated car",
            "data" => $car
        ], 200);
    }

    public function deleteCar($car_id)
    {
        $this->carModel->delete($car_id);
        return $this->respond([
            "message" => "Success delete car",
        ], 200);
    }
}
