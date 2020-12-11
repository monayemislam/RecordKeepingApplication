<?php namespace App\Models;

use CodeIgniter\Model;

class Sell extends Model
{
        protected $table = 'sell';
        protected $primaryKey = 'sellId';
        protected $allowedFields = ['customerId', 'sellId','transactionType','productName','quantity','unit','price','payment','sellDate'];
}