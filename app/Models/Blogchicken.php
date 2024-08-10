<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blogchicken extends Model
{
    use HasFactory;
     protected $guarded=[];
    protected $with = ['category', 'type'];


    public function scopeFilter($query, $filter) //Blog::latest()->filter()
    {
        
        $query->when($filter['category'] ?? false, function ($query, $slug) {
            $query->whereHas('category', function ($query) use ($slug) {
                $query->where('slug', $slug);
            });
        });
        $query->when($filter['type'] ?? false, function ($query, $slug) {
            $query->whereHas('type', function ($query) use ($slug) {
                $query->where('slug', $slug);
            });
        });
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function type()
    {
        return $this->belongsTo(Type::class);
    }
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
