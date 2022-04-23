<?php

namespace App\Models;
use CodeIgniter\Model;

class PackagingModel extends Model
{
    protected $table = 'packaging';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id', 'packaging_name'];
}