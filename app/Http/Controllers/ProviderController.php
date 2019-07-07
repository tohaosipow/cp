<?php
/**
 * Created by PhpStorm.
 * User: tohao
 * Date: 06.07.2019
 * Time: 14:40
 */

namespace App\Http\Controllers;


use App\Category;
use App\Services\ProviderService;
use Illuminate\Http\Request;

class ProviderController extends Controller
{
   public function providers(){

   }

   public function create(){
       return view('providers.create', ['categories' => Category::all()]);
   }


   public function createPost(Request $request){
        $service = new ProviderService();
        $service->createProvider($request->name, $request->categories);
        return $this->create();
   }
   public function edit(){

   }

   public function remove(){

   }
}