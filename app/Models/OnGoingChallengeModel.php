<?php

namespace App\Models;
use CodeIgniter\Model;

class OnGoingChallengeModel extends Model
{
    protected $table = 'ongoing_challenge';
    protected $primaryKey = 'id';
    protected $allowedFields = ['challenge_id', 'user_id'];
}