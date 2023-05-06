<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Posts extends Model
{
    use HasFactory;
    protected $guarded = [
        "id",
    ];

    protected $table = 'posts';
    public function category(): HasOne
    {
        return $this->hasOne(Categories::class,'id','post_cat');
    }
    public function user_name(): hasOne
    {
        return $this->hasOne(User::class,"id","userid");
    }
   
}
