<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Receipt extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'note',
        'user_id',
        'supplier_id'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }
    
    public function supplier() {
        return $this->belongsTo(Supplier::class);
    }

    public function products() {
        return $this->belongsToMany(Product::class, 'receipt_detail', 'receipt_id');
    }
    public function receiptDetails() {
        return $this->hasMany(ReceiptDetail::class);
    }
    public function getTotalReceiptAttribute()
    {
        return $this->receiptDetails->sum('total');
    }
    public function scopeSearch($query, $data)
    {
        if (isset($data['search'])) {
            $query->where('created_at','LIKE', '%'.$data['search'].'%');
            // $query->where('user_id','LIKE', '%'.$data[search].'%');
        }
    }
}
