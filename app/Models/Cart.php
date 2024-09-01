<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function user()
{
    return $this->hasMany(User::class);
}
public function payment()
{
    return $this->belongsTo(Payment::class);
}

}
