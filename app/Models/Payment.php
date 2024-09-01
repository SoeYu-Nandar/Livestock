<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    protected $guarded=[];
    public function user()
{
    return $this->belongsTo(User::class);
}
public function cartItems()
{
    return $this->hasMany(Cart::class, 'payment_id'); // Ensure this column exists and correctly links
}


}
