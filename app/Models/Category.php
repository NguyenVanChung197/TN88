<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'parent_id',
        'description',
        'active'
    ];

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function scopeSearch($query, $data)
    {
        if (isset($data['search'])) {
            // $query->where('name', 'LIKE', '%' . $data['search'] . '%')->orWhere('description', 'LIKE', '%' . $data['search'] . '%');
            $query->where('name', 'LIKE', '%' . $data['search'] . '%')->orWhere('description', 'LIKE', '%' . $data['search'] . '%');
        }
    }
}
