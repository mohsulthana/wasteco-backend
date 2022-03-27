<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
		$data['content'] = 'dashboard';
		$data['title']	 = 'Dashboard | NCP';
		$data['data'] = 'Hello world';
		echo $this->template($data);
    }
}
