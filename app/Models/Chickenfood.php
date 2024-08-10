<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chickenfood extends Model
{
    use HasFactory;
    protected $guarded=[];
    protected $with = ['company'];

    public function scopeFilter($query, $filter) //Chickenfood::latest()->filter()
    {
        
        $query->when($filter['company'] ?? false, function ($query, $slug) {
            $query->whereHas('company', function ($query) use ($slug) {
                $query->where('slug', $slug);
            });
        });
        $query->when($filter['search'] ?? false, function ($query, $search) {
            $query->where(function ($query) use ($search) {
                $query->where('code', 'LIKE', '%' . $search . '%');
                   
            });
        });
        
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }    
}
