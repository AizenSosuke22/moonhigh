<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Product;

class Wishlist extends Model
{
    use HasFactory;
    protected $table = 'wishlist';
    protected $primarykey  = 'id';
    protected $fillable = [
        'product_id', 'user_id'
    ];

    public function product(){
        return $this->belongsTo(Product::class);
    }
}
