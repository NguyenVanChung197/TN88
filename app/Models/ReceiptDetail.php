<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ReceiptDetail extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'receipt_detail';
    protected $fillable = [
        'product_id',
        'receipt_id',
        'qty',
        'import_price',
        'total'
    ];

    public function receipt() {
        return $this->belongsTo(Receipt::class);
    }

    public function products()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }
}
