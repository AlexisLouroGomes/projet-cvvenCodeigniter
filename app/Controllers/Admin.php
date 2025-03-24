<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\Database\Exceptions\DatabaseException;

class Admin extends BaseController
{
    protected $session;

    public function __construct()
    {
        $this->session = session();
    }

    private function isAdmin()
    {
        return $this->session->get('isLoggedIn') && $this->session->get('role') === 'admin';
    }

    public function delete()
    {
        if (!$this->isAdmin()) {
            return redirect()->to('/compte')->with('error', 'Accès refusé');
        }

        $request = service('request');
        $table = $request->getPost('table');
        $id = $request->getPost('id');

        if (!$table || !$id || !is_numeric($id)) {
            return redirect()->back()->with('error', 'Requête invalide');
        }

        $db = \Config\Database::connect();
        try {
            $builder = $db->table($table);
            $builder->where('id', $id)->delete();
        } catch (DatabaseException $e) {
            return redirect()->back()->with('error', 'Erreur lors de la suppression');
        }

        return redirect()->back()->with('message', 'Entrée supprimée avec succès.');
    }

    public function deleteAll()
    {
        if (!$this->isAdmin()) {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Accès refusé'
            ]);
        }

        $json = $this->request->getJSON(true);
        $table = $json['table'] ?? null;

        if (!$table) {
            return $this->response->setJSON(['status' => 'error', 'message' => 'Table non spécifiée']);
        }

        $db = \Config\Database::connect();
        try {
            $builder = $db->table($table);
            $builder->truncate();
        } catch (DatabaseException $e) {
            return $this->response->setJSON(['status' => 'error', 'message' => 'Erreur SQL']);
        }

        return $this->response->setJSON(['status' => 'success', 'message' => "Table $table vidée avec succès."]);
    }
}
