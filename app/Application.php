<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    protected $appends = ['executor', 'provider'];
    protected $table = "applications";

    public function category(){
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function creator(){
        return $this->belongsTo(User::class, 'creator_id');
    }

    public function states(){
        return $this->hasMany(ApplicationState::class, 'application_id');
    }

    public function getProviderAttribute(){
        $pr =$this->states()->where('finished', 0)->whereNotNull('provider_id')->latest()->first();
        if($pr) return $pr->provider;
        return null;
    }

    public function getExecutorAttribute(){
        return $this->states()->where('finished', 0)->first()->executor;
    }

}
