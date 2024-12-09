<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medicine extends Model
{
    use HasFactory;

    protected $fillable = [
        'seller',
        'image',
        'brand_option',
        'brand',
        'seller',
        'name',
        'brief',
        'unit_of_measurement',
        'unit',
        'weight',
        'weight_in',
        'tax_category',
        'mrp_b2b',
        'mrp_b2c',
        'mrp_b2d',
        'b2c_price',
        'b2b_price',
        'b2b2c_price',
        'collection',
        'description',
        'features',
        'benefits',
        'ingredients',
        'additional_information',
        'inventory_management',
        'inventory_allow_out_of_stock',
        'inventory_quantity',
        'inventory_low_stock_quantity',
        'option_and_variants',
    ];
}