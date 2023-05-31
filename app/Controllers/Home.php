<?php

namespace App\Controllers;

use App\Models\Car;
use App\Models\Category;

class Home extends BaseController
{
    protected $carModel;
    protected $categoryModel;

    public function __construct()
    {
        $this->carModel = new Car();
        $this->categoryModel = new Category();
    }

    public function index()
    {
        try {
            $cars = $this->carModel->getCarJoinCategory();
            return view('home', ['cars' => $cars]);
        } catch (\Exception $err) {
            return $err->getMessage();
        }
    }

    public function detailCar($car_id)
    {
        try {
            $car = $this->carModel->findCarJoinCategory($car_id);
            return view('detail_car', ['car' => $car]);
        } catch (\Exception $err) {
            return $err->getMessage();
        }
    }

    public function createCar()
    {
        $category = $this->categoryModel->findAll();
        return view('create_car', ['categories' => $category]);
    }

    public function saveCar()
    {
        // dd($this->request->getVar());
        try {
            $reqBody = $this->request->getVar();
            $this->carModel->save([
                'car_name' => $reqBody['car_name'],
                'price' => $reqBody['price'],
                'year' => $reqBody['year'],
                'image_url' => 'https://www.toyota.astra.co.id/sites/default/files/2022-01/02%20attitude%20black%20mica%20%28all%20type%29.png',
                'description' => $reqBody['description'],
                'category_id' => $reqBody['category_id'],
            ]);
            return redirect()->to('/');
        } catch (\Exception $err) {
            return $err->getMessage();
        }
    }
}
