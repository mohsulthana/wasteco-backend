<?php

namespace App\Models;
use CodeIgniter\Model;

class ActivityModel extends Model
{
    protected $table = 'activity';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id', 'activity_name'];
}