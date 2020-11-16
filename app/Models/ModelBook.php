<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelBook extends Model
{
    protected $table = 'books';
    protected $fillable = ['title','purchase_price','selling_price','quantity','created_at','updated_at'];
}
