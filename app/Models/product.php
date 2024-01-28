<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Category;
use App\Models\Sale;

class product extends Model
{
    use HasFactory;
    protected $table = 'product';
    protected $primarykey  = 'id';
    protected $fillable = [
        'name', 'cover', 'price', 'description', 'type'
    ];

    public function categories(){
        return $this->belongsToMany(Category::class, 'product_category');
    }

    public function sale(){
        return $this->hasOne(Sale::class);
    }
}
