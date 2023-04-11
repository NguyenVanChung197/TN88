<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Rate extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'content',
        'star',
        'product_id',
        'user_id',
        'parent_id'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function product() {
        return $this->belongsTo(Product::class);
    }

    public function replies() {
        return $this->hasMany(Reply::class);
    }

    public function scopeComments($query)
    {
        return $query->whereNull('parent_id');
    }

    public function scopeReplies($query)
    {
        return $query->whereNotNull('parent_id');
    }

    public function isMyReview()
    {
        return $this->user()->whereHas('rates', function ($query) {
            $query->whereNull('parent_id')->where('rates.user_id', auth()->id());
        })->exists();
    }

    public function isMyReply()
    {
        return $this->user()->whereHas('rates', function ($query) {
            $query->whereNotNull('parent_id')->where('rates.user_id', auth()->id());
        })->exists();
    }
}