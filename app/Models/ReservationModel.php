<?php

namespace App\Models;

use CodeIgniter\Model;

class ReservationModel extends Model
{
    protected $table = 'reservations';
    protected $primaryKey = 'id';
    protected $allowedFields = ['user_id', 'logement_id', 'nom', 'prenom', 'date_debut', 'date_fin', 'prix_total'];
    public $useTimestamps = false;
}
