<?php

namespace App\Controllers;

use App\Models\LogementModel;

class Logements extends BaseController
{
    public function index()
    {
        $model = new LogementModel();
        $data['logements'] = $model->findAll();
        return view('logements', $data);
    }

    public function getJson()
    {
        $model = new LogementModel();
        $logements = $model->findAll();
        return $this->response->setJSON($logements);
    }
}
