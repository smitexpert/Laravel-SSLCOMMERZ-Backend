<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'tran_id',
        'total_amount',
        'cus_name',
        'cus_email',
        'cus_add1',
        'cus_add2',
        'cus_city',
        'cus_state',
        'cus_postcode',
        'cus_country',
        'cus_phone',
        'cus_fax',
        'ship_name',
        'ship_add1',
        'ship_add2',
        'ship_city',
        'ship_state',
        'ship_postcode',
        'ship_phone',
        'ship_country',
        'shipping_method',
        'product_name',
        'product_category',
        'product_profile',
        'status',
    ];
}
