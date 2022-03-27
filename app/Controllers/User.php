<?php

namespace App\Controllers;

use App\Models\UserModel;

class User extends BaseController
{
    private $challengeModel;

    function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function index()
    {
		$data['content'] = 'user';
		$data['title']	 = 'Users | NCP';
		$data['challenge'] = $this->userModel->findAll();

		echo $this->template($data);
    }
}
