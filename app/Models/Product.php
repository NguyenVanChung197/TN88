<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'thumb',
        'price',
        'qty',
        'category_id',
        'description',
        'active',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function orders() {
        return $this->belongsToMany(Order::class, 'order_details', 'product_id');
    }

    public function receipts() {
        return $this->belongsToMany(Receipt::class, 'receipt_detail', 'product_id');
    }

    public function scopeSearch($query, $data)
    {
        if (isset($data['search'])){
            $query->where('name', 'LIKE', '%' . $data['search'] . '%');
        }
    }

    public function rates() {
        return $this->hasMany(Rate::class);
    }
}
