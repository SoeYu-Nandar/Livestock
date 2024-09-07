<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chickenbreeding extends Model
{
    use HasFactory;
    protected $guarded=[];
    public function scopeFilter($query, $filter) 
    {
        $query->when($filter['search'] ?? false, function ($query, $search) {
            $query->where(function ($query) use ($search) {
                $query->where('description', 'LIKE', '%' . $search . '%');
                   
            });
        });
       
    }
}
