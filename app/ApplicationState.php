<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ApplicationState extends Model
{
    protected $table = "applications_states";

    public function executor(){
        return $this->belongsTo(User::class, 'executor_id');
    }

    public function provider(){
        return $this->belongsTo(Provider::class, 'provider_id');
    }

    public function application(){
        return $this->belongsTo(Application::class, 'application_id');
    }
}
