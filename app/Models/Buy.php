<?php namespace App\Models;

use CodeIgniter\Model;

class Buy extends Model
{
        protected $table = 'buy';
        protected $primaryKey = 'buyId';
        protected $allowedFields = ['productId','productName','quantity','unit','price','date'];
}