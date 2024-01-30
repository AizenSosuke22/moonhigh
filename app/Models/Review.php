<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\User;

class Review extends Model
{
    use HasFactory;
    protected $table = 'review';
    protected $primarykey  = 'id';
    protected $fillable = [
        'product_id', 'user_id', 'comment'
    ];

    public function client(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
