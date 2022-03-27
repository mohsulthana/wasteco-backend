<?php namespace App\Controllers\API;

use App\Models\ChallengeHarianModel;
use App\Models\ChallengeResultModel;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\OnGoingChallengeModel;
use CodeIgniter\HTTP\RequestInterface;

class ChallengeHarian extends ResourceController {

    use ResponseTrait;

    protected $request;
    private $challengeHarianModel;
    private $onGoingChallengeModel;
    private $challengeResultModel;

    public function __construct()
    {
        $this->challengeHarianModel = new ChallengeHarianModel();
        $this->onGoingChallengeModel = new OnGoingChallengeModel();
        $this->challengeResultModel = new ChallengeResultModel();
        $this->request = \Config\Services::request();
    }

    public function index()
    {
        $data = $this->challengeHarianModel->findAll();
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
            'type'  => 'harian'
        ];

        $challenge_ongoing_id = $this->onGoingChallengeModel->insert($challengeData);

        if ($challenge_ongoing_id) {
            $challengeData['id'] = $challenge_ongoing_id;
            return $this->respondCreated($challengeData);
        }

        return $this->fail('Sorry! no challenge created');
    }

    public function getAllOngoingChallengeHarian()
    {
        $validation = $this->validate([
            'user_id' => 'required'
        ]);

        if (!$validation) {
            return $this->failValidationErrors($this->validator->getErrors());
        }

        $data = $this->onGoingChallengeModel->where('ongoing_challenge.user_id', $this->request->getVar('user_id'))->join('challenge_harian', 'challenge_harian.id = ongoing_challenge.challenge_id')->findAll();

        if ($data) {
            return $this->respond($data, 200);
        }

        return $this->failNotFound("Data not found");
    }

    public function submit()
    {
        $validation = $this->validate([
            'image' => 'required',
            'user_id' => 'required',
            'challenge_id' => 'required'
        ]);

        if (!$validation) {
            return $this->failValidationErrors($this->validator->getErrors());
        }

        $file = $this->request->getFile('image');
        $image = $file->getName();
        // Renaming file before upload
		$temp = explode(".", $image);
		$newfilename = round(microtime(true)) . '.' . end($temp);

        if ($file->move("images/challenge", $newfilename)) {
            $challengeData = [
                'challenge_id' => $this->request->getPost('challenge_id'),
                'user_id'   => $this->request->getPost('user_id'),
                'type'  => 'harian',
                'image' => $newfilename,
            ];

            if ($this->challengeResultModel->insert($challengeData)) {
                return $this->respondCreated($challengeData);
            }

            return $this->failNotFound("Failed to submit challenge");
        }

        return $this->failNotFound("Failed to save image");
    }
}