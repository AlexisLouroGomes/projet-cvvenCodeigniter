<?php

namespace App\Controllers;

use App\Models\ReservationModel;
use App\Models\LogementModel;

class Reservation extends BaseController
{
    public function index()
    {
        $session = session();

        if (!$session->get('isLoggedIn')) {
            return redirect()->to('/login');
        }

        $logementModel = new LogementModel();
        $logements = $logementModel->findAll();

        return view('reservation', ['logements' => $logements]);
    }

    public function submit()
    {
        $session = session();

        if (!$session->get('isLoggedIn')) {
            return redirect()->to('/login');
        }

        $prixParNuit = $this->request->getPost('prix_par_nuit');
        $dateDebut = new \DateTime($this->request->getPost('date_debut'));
        $dateFin = new \DateTime($this->request->getPost('date_fin'));
        $nbJours = $dateDebut->diff($dateFin)->days;

        $reservationModel = new ReservationModel();

        $reservationModel->save([
            'user_id' => $session->get('user_id'),
            'logement_id' => $this->request->getPost('logement'),
            'nom' => $this->request->getPost('nom'),
            'prenom' => $this->request->getPost('prenom'),
            'date_debut' => $dateDebut->format('Y-m-d'),
            'date_fin' => $dateFin->format('Y-m-d'),
            'prix_total' => $prixParNuit * $nbJours
        ]);

        return redirect()->to('/compte')->with('message', 'Réservation enregistrée.');
    }

    public function delete($id)
    {
        $reservationModel = new ReservationModel();
        $reservationModel->delete($id);
        return redirect()->to('/compte')->with('message', 'Réservation supprimée.');
    }

    public function edit($id)
    {
        $session = session();
        if (!$session->get('isLoggedIn')) {
            return redirect()->to('/login');
        }

        $reservationModel = new ReservationModel();
        $logementModel = new LogementModel();

        $reservation = $reservationModel->find($id);
        $logements = $logementModel->findAll();

        if (!$reservation || $reservation['user_id'] != $session->get('user_id')) {
            return redirect()->to('/compte');
        }

        return view('reservation_edit', [
            'reservation' => $reservation,
            'logements' => $logements
        ]);
    }

    public function update($id)
    {
        $session = session();
        if (!$session->get('isLoggedIn')) {
            return redirect()->to('/login');
        }

        $prixParNuit = $this->request->getPost('prix_par_nuit');
        $dateDebut = new \DateTime($this->request->getPost('date_debut'));
        $dateFin = new \DateTime($this->request->getPost('date_fin'));
        $nbJours = $dateDebut->diff($dateFin)->days;

        $reservationModel = new ReservationModel();

        $reservationModel->update($id, [
            'logement_id' => $this->request->getPost('logement'),
            'nom' => $this->request->getPost('nom'),
            'prenom' => $this->request->getPost('prenom'),
            'date_debut' => $dateDebut->format('Y-m-d'),
            'date_fin' => $dateFin->format('Y-m-d'),
            'prix_total' => $prixParNuit * $nbJours
        ]);

        return redirect()->to('/compte')->with('message', 'Réservation mise à jour.');
    }
}
