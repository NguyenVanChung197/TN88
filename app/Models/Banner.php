<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'url',
        'thumb',
        'sort_by',
        'active'
    ];

    public function scopeSearch($query, $data)
    {
        if (isset($data['search'])) {
            $query->where('name', 'LIKE', '%' . $data['search'] . '%');
        }
    }
}
