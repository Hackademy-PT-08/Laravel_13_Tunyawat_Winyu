<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Oreder extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'billing_address',
        'shipping_address',
        'total'
    ];
}
