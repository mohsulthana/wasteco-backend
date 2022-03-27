<?php

namespace App\Controllers;

use App\Models\ChallengeModel;

class Challenge extends BaseController
{
    private $challengeModel;

    function __construct()
    {
        $this->challengeModel = new ChallengeModel();
    }

    public function index()
    {
		$data['content'] = 'challenge';
		$data['title']	 = 'Challenges | NCP';
		$data['challenge'] = $this->challengeModel->findAll();

		echo $this->template($data);
    }
}
