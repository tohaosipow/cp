<?php
/**
 * Created by PhpStorm.
 * User: tohao
 * Date: 06.07.2019
 * Time: 18:23
 */

namespace App\Services;


use App\Category;
use App\Provider;
use App\Role;
use App\User;
use Illuminate\Support\Facades\Auth;

class ProviderService
{
    public function createProvider($name, $categories){
        $provider = new Provider();
        $provider->name = $name;
        $provider->save();
        foreach ($categories as $category){
            $provider->categories()->attach(Category::find($category));
        }
        /* @var User $user*/
        $user = Auth::user();
        $provider->save();
        $user->providers()->attach($provider, ['role_id' => Role::where('mnemo', 'admin')->first()->id]);


    }

}