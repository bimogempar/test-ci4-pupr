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
        // input image
        $imageCar = $this->request->getFile('car_image');
        $pathName = $imageCar->getRandomName();
        $imageCar->move('car_image', $pathName);

        try {
            $reqBody = $this->request->getVar();
            $this->carModel->save([
                'car_name' => $reqBody['car_name'],
                'price' => $reqBody['price'],
                'year' => $reqBody['year'],
                'image_url' => $pathName,
                'description' => $reqBody['description'],
                'category_id' => $reqBody['category_id'],
            ]);
            return redirect()->to('/');
        } catch (\Exception $err) {
            return $err->getMessage();
        }
    }

    public function deleteCar($car_id)
    {
        $car = $this->carModel->find($car_id);
        if ($car['image_url'] != null) {
            unlink('car_image/' . $car['image_url']);
        }
        $this->carModel->delete($car_id);
        return redirect()->to('/');
    }

    public function editCar($car_id)
    {
        $car = $this->carModel->find($car_id);
        $categories = $this->categoryModel->findAll();
        return view('edit_car', [
            'car' => $car,
            'categories' => $categories
        ]);
    }

    public function updateCar($car_id)
    {
        $reqBody = $this->request->getVar();
        $imageCar = $this->request->getFile('car_image');
        $pathName = $imageCar->getRandomName();
        $imageCar->move('car_image', $pathName);

        $car = $this->carModel->update($car_id, [
            "car_name" => $reqBody['car_name'],
            "price" => $reqBody['price'],
            "year" => $reqBody['year'],
            "description" => $reqBody['description'],
            "category_id" => $reqBody['category_id'],
            "image_url" => $pathName
        ]);
        return redirect()->to('/');
    }
}
