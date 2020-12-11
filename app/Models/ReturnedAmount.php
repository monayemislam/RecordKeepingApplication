<?php namespace App\Models;

use CodeIgniter\Model;

class ReturnedAmount extends Model
{
        protected $table = 'returnproduct';
        protected $primaryKey = 'returnId';
        protected $allowedFields = ['customerId', 'returnId','transactionType','productName','quantity','unit','price','returnedAmount','returnDate'];
}