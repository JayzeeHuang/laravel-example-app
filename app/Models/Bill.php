<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    use HasFactory;

    protected $fillable = [
        'sn',
        'description',
        'first_name',
        'last_name',
        'lat',
        'lng',
        'address',
        'suburb',
        'city',
        'country',
        'postcode',
        'cellphone',
   
        'tax',
        'transaction_fee',
        'discount',
        'insurance_fee',
        'refund',
        'total',
        'paid',
    ];
}
