<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'name','slug','summary', 'description', 'available_qty','brand_id',
        'cat_id','child_cat_id', 'photo',
        'bar_code','unique_code','serial_number','unit_cost',
        'unit_price','cost_price','offer_price','markup_price','no','discount',
        'item_size','color','date_of_manufacture','entry_date',
        'expiry_date','conditions','vendor_id','umeasure_id','status','entered_by' 
    ];
}
