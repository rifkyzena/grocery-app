<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $primaryKey  = 'order_id';
    protected $guarded = [];

    public function item(){
        return $this->belongsTo(Item::class, 'item_id', 'item_id');
    }
}
