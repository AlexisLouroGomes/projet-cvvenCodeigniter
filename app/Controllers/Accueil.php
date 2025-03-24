<?php

namespace App\Controllers;

class Accueil extends BaseController
{
    public function index()
    {
        $session = session();
        if (!$session->get('isLoggedIn')) {
            return redirect()->to('/login');
        }

        return view('accueil');
    }
}
