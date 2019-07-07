<?php
/**
 * Created by PhpStorm.
 * User: tohao
 * Date: 07.07.2019
 * Time: 12:52
 */

namespace App\Services;


use App\Application;
use App\ApplicationState;
use App\Category;
use App\Provider;
use App\User;

class ApplicationService
{
    public function createApplication($category_id, $text, $phone, $lat, $lon, $record_url, $idd){
        if(count(Application::where('tele_id', $idd)->get()) > 0) return 1;
        $c = Category::find($category_id);
        $app = new Application();
        $app->category()->associate($c);
        $app->creator()->associate(User::find(1));
        $app->title = $text;
        $app->text = $text;
        $app->phone = $phone;
        $app->lat = $lat;
        $app->long = $lon;
        $app->record_url = $record_url;
        $app->tele_id = $idd;
        $app->save();
        $provider = Provider::whereHas('categories', function ($q) use ($category_id){
            $q->where('categories.id', $category_id);
        })->first();
        $state = new ApplicationState();
        $state->application()->associate($app);
        $state->provider()->associate($provider);
        $state->comment = " ";
        $state->save();
        $smss = new SmsService();
        $smss->send($phone, "Ваша заявка принята и отнесена к категории ".$c->name."\n Над ней работает ".$provider->name."!");


    }

}