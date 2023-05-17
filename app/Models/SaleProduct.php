<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SaleProduct extends Model
{
    use HasFactory;

    protected $fillable =[
        'sale_id',
        'product_id',
        'count',
        'price',
        'total',
        'cost'
    ];

    public function product()
    {
        return $this->hasMany(Product::class, 'id', 'product_id')->withTrashed();
    }
}
