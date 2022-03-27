<?php namespace App\Controllers\API;

use App\Models\ChallengeBertahapModel;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\OnGoingChallengeModel;
use CodeIgniter\HTTP\RequestInterface;

class ChallengeBertahap extends ResourceController {

    use ResponseTrait;

    protected $request;
    private $challengeBertahapModel;
    private $onGoingChallengeModel;

    public function __construct()
    {
        $this->challengeBertahapModel = new ChallengeBertahapModel();
        $this->onGoingChallengeModel = new OnGoingChallengeModel();
        $this->request = \Config\Services::request();
    }

    public function index()
    {
        $data = $this->challengeBertahapModel->findAll();
        return $this->respond($data, 200);
    }

    public function join()
    {
        $validation = $this->validate([
            'challenge_id' => 'required',
            "user_id" => "required",
        ]);

        if (!$validation) {
            return $this->failValidationErrors($this->validator->getErrors());
        }

        $challengeData = [
            'challenge_id' => $this->request->getPost('challenge_id'),
            'user_id'   => $this->request->getPost('user_id'),
            'type'  => 'bertahap'
        ];

        $challenge_ongoing_id = $this->onGoingChallengeModel->insert($challengeData);

        if ($challenge_ongoing_id) {
            $challengeData['id'] = $challenge_ongoing_id;
            return $this->respondCreated($challengeData);
        }

        return $this->fail('Sorry! no challenge created');
    }

    public function getAllOngoingChallengeBertahap()
    {
        $validation = $this->validate([
            'user_id' => 'required'
        ]);

        if (!$validation) {
            return $this->failValidationErrors($this->validator->getErrors());
        }

        $data = $this->onGoingChallengeModel->where('ongoing_challenge.user_id', $this->request->getVar('user_id'))->where('ongoing_challenge.type', 'bertahap')->join('challenge_harian', 'challenge_harian.id = ongoing_challenge.challenge_id')->findAll();

        if ($data) {
            return $this->respond($data, 200);
        }

        return $this->failNotFound("Data not found");
    }
}