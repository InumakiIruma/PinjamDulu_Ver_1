<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Help extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Pusat Bantuan'
        ];

        return view('help/index', $data);
    }
}
