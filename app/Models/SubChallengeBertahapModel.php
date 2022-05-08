<?php

namespace App\Models;
use CodeIgniter\Model;

class SubChallengeBertahapModel extends Model
{
    protected $table = 'challenge_bertahap_items';
    protected $primaryKey = 'id';
    protected $allowedFields = ['challenge_id', 'challenge_name', 'description', 'created_at', 'isActive'];
}