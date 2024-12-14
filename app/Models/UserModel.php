<?php

namespace APP\Models;
use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'users';
    protected $allowedFields = ['username', 'email', 'password'];
    protected $useTimestamps = true;
}