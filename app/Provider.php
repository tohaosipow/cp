<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Provider extends Model
{
    protected $fillable = ['name'];
    protected $table = "providers";

    public function categories(){
            return $this->belongsToMany(Category::class, 'providers_categories', 'provider_id', 'category_id');
    }
}
