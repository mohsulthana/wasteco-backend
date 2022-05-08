<?php

namespace App\Controllers;

use App\Models\ChallengeHarianModel;

class Challenge extends BaseController
{
    private $challengeHarianModel;

    function __construct()
    {
        $this->challengeHarianModel = new ChallengeHarianModel();
    }

    public function index()
    {
		$data['content'] = 'challenge';
		$data['title']	 = 'Challenges | NCP';
		$data['challenge'] = $this->challengeHarianModel->findAll();

		echo $this->template($data);
    }
}
