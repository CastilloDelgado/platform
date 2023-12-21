<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostImage extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function imageUrl(): Attribute
    {
        return Attribute::make(
            get: fn(string $image_url) => asset('storage/'. $image_url)
        );
    }

    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
