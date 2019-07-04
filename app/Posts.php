<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Posts extends Model
{
    
    use SoftDeletes;

    protected $fillable = [
        "id",
        "title",
        "id_image",
        "category_id"
    ];



    public function category(){

        return $this->belongsTo(Category::class);

    }


    public function user(){

        return $this->belongsTo(User::class);


    }
    
}
