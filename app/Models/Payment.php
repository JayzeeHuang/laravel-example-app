<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'gateway',
        'transaction_ref_no',
        'transaction_status',
        'payment_amount',
        'paid_amount',
        'currency_code'
    ];
}
