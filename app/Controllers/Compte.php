<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\ReservationModel;

class Compte extends BaseController
{
    public function index()
    {
        $session = session();

        // Vérifie que l'utilisateur est connecté
        if (!$session->get('isLoggedIn')) {
            return redirect()->to('/login');
        }

        $userModel = new UserModel();
        $reservationModel = new ReservationModel();

        $userId = $session->get('user_id');

        // Récupération des infos utilisateur
        $user = $userModel->find($userId);

        // Récupération des réservations
        $reservations = $reservationModel
            ->where('user_id', $userId)
            ->findAll();

        // Si admin, on récupère tout
        $adminData = [];
        if ($user['role'] === 'admin') {
            $adminData = [
                'users' => $userModel->findAll(),
                'reservations' => $reservationModel->findAll()
            ];
        }

        return view('compte', [
            'user' => $user,
            'reservations' => $reservations,
            'admin_data' => $adminData
        ]);
    }
}
