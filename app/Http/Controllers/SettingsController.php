<?php
/**
 * Created by PhpStorm.
 * User: tohao
 * Date: 06.07.2019
 * Time: 17:57
 */

namespace App\Http\Controllers;


use App\Category;
use App\Provider;

class SettingsController
{
    public function categories(Provider $provider){
        return view('settings.categories', ['categories' => Category::all()]);
    }

}