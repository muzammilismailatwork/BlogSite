<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\hasMany;
class Categories extends Model
{
    use HasFactory;
    protected $guarded = [
      "id",
    ];
    public function posts(): hasMany
    {
        return $this->hasMany(Posts::class,'post_cat','id');
    }

}
