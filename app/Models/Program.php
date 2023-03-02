<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    // use HasFactory;
    protected $table = 'transaction';
    protected $fillable = [
        'id',	'reference_no',	'price',	'quantity',	'payment_amount',	'product_id',	'created_at'
      ];
}
