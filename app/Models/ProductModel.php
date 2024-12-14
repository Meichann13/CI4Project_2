<?php

namespace APP\Models;

use CodeIgniter\Model;

class ProductModel extends Model
{
    protected $table = 'products';
    protected $primarykey = 'id';
    protected $allowedFields = ['name', 'price', 'decription', 'category'];
}