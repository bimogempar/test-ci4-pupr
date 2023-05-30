<?php

namespace App\Models;

use CodeIgniter\Model;

class Car extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'cars';
    protected $primaryKey       = 'car_id';
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = false;
    protected $allowedFields    = [];
    protected $useTimestamps = true;

    public function getCarJoinCategory()
    {
        return $this->db->table('cars')->join('categories', 'cars.category_id = categories.category_id')->get()->getResultArray();
    }

    public function findCarJoinCategory($car_id)
    {
        return $this->db->table('cars')->join('categories', 'cars.category_id = categories.category_id')->where('car_id', $car_id)->get()->getRow();
    }
}
