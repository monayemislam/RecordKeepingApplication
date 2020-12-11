<?php namespace App\Models;

use CodeIgniter\Model;

class Login extends Model
{
        protected $table = 'login';
        protected $primaryKey = 'login_id';
        protected $allowedFields = ['username', 'password'];
}