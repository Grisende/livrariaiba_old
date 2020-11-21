<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelSelling extends Model
{
    protected $fillable = ['title', 'id_book', 'selling_price','quantity', 'payment_method', 'customer_name', 'obs', 'created_at','updated_at'];  
    protected $table = 'selling';
}
