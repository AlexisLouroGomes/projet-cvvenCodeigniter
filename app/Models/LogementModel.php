<?php

namespace App\Models;

use CodeIgniter\Model;

class LogementModel extends Model
{
    protected $table = 'logements';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nom', 'prix_par_nuit', 'description', 'image'];
}
