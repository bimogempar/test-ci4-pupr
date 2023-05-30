<?php

namespace App\Controllers;

use App\Models\Car;

class Home extends BaseController
{
    protected $carModel;

    public function __construct()
    {
        $this->carModel = new Car();
    }

    public function index()
    {
        try {
            $cars = $this->carModel->getCarJoinCategory();
            return view('home', ['cars' => $cars]);
        } catch (\Exception $err) {
            throw $err->getMessage();
        }
    }

    public function detailCar($car_id)
    {
        try {
            $car = $this->carModel->findCarJoinCategory($car_id);
            return view('detail_car', ['car' => $car]);
        } catch (\Exception $err) {
            throw $err->getMessage();
        }
    }
}
