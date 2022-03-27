<?php

namespace App\Models;
use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $allowedFields = ['challenge_name', 'challenge_type', 'description', 'start_date', 'end_date', 'created_at', 'image'];
}