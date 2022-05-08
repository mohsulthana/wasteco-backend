<?php

namespace App\Models;
use CodeIgniter\Model;

class PackagingModel extends Model
{
    protected $table = 'packaging_material';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id', 'packaging_name'];
}