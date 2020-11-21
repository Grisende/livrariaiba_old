<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelOrder extends Model
{
    protected $table = 'order';
    protected $fillable = ['id_book','title', 'quantity', 'customer_name', 'status', 'obs', 'created_at','updated_at'];
}
