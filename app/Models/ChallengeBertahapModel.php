<?php

namespace App\Models;
use CodeIgniter\Model;

class ChallengeBertahapModel extends Model
{
    protected $table = 'challenge_bertahap';
    protected $primaryKey = 'id';
    protected $allowedFields = ['challenge_name', 'challenge_type', 'description', 'start_date', 'end_date', 'created_at', 'image'];
}