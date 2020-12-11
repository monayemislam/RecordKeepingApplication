<?php namespace App\Models;

use CodeIgniter\Model;

class Customer extends Model
{
        protected $table = 'customer_details';
        protected $primaryKey = 'id';
        protected $allowedFields = ['id', 'name','address','mobile','email','registration_date'];
}