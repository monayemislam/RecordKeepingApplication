<?php namespace App\Models;

use CodeIgniter\Model;

class Product extends Model
{
        protected $table = 'products';
        protected $primaryKey = 'productId';
        protected $allowedFields = ['productId', 'productName','productType','productAddDate'];
}