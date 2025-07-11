<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    /** @use HasFactory<\Database\Factories\OrderFactory> */
    use HasFactory;

    protected $fillable = [
        'address',
        'phone',
    ];

    public function products(){
        return $this->belongsToMany(Product::class)
                    ->withTimestamps()
                    ->withPivot('quantity');
    }
}
