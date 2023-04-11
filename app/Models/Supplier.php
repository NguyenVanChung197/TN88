<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Supplier extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'phone_number',
        'address',
        'active'
    ];

    public function receipts() {
        return $this->hasMany(Receipt::class);
    }

    public function scopeSearch($query, $data)
    {
        if (isset($data['search'])) {
            $query->where('name', 'LIKE', '%' . $data['search'] . '%');
        }
    }
}
