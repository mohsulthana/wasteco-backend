<?php

namespace App\Models;
use CodeIgniter\Model;

class ChallengeResultModel extends Model
{
    protected $table = 'submitted_challenge';
    protected $primaryKey = 'id';
    protected $allowedFields = ['challenge_id', 'user_id', 'image', 'submit_at'];
}