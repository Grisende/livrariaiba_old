<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelBook extends Model
{
    protected $table = 'books';
    protected $fillable = ['title','purchase_price','selling_price','quantity','created_at','updated_at'];

    public function relPurchase()
    {
        return $this->hasMany('App\Models\ModelPurchase', 'id_book');
    }

    public function relSelling()
    {
        return $this->hasMany('App\Models\ModelSelling', 'id_book');
    }
}
