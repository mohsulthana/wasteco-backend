<?php namespace App\Controllers\API;

use App\Models\PackagingModel;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;

class PackagingMaterial extends ResourceController {

    use ResponseTrait;
    private $packagingModel;

    public function __construct()
    {
        $this->packagingModel = new PackagingModel();
    }

    public function index()
    {
        $data = $this->packagingModel->findAll();
        return $this->respond($data, 200);
    }
}