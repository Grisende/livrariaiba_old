<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelPurchase extends Model
{
    protected $table = 'purchase';

    protected $fillable = ['title', 'id_book', 'purchase_price','selling_price','quantity', 'store', 'payment_method', 'status', 'order', 'created_at','updated_at'];  
}
