<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelPurchase extends Model
{
    protected $table = 'purchase';

    public function relBook()
    {
        return $this->hasMany('App\Models\ModelBook', 'id', 'id_book');
    }
}
