<?php namespace App\Controllers\API;

use App\Models\ActivityModel;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;

class Activity extends ResourceController {

    use ResponseTrait;
    private $activityModel;

    public function __construct()
    {
        $this->activityModel = new ActivityModel();
    }

    public function index()
    {
        $data = $this->activityModel->findAll();
        return $this->respond($data, 200);
    }
}