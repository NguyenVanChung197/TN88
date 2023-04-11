<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'name',
        'phone_number',
        'address',
        'message',
        'status',
    ];

    public function orderDetails() {
        return $this->hasMany(OrderDetail::class);
    }

    public function products() {
        return $this->belongsToMany(Product::class, 'order_details', 'order_id');
    }

    public function scopeSearch($query, $data)
    {
        if (isset($data['search'])) {
            $query->where('created_at','LIKE', '%'.$data['search'].'%');
            // $query->where('user_id','LIKE', '%'.$data[search].'%');
        }
    }
}
