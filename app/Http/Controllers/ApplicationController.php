<?php
/**
 * Created by PhpStorm.
 * User: tohao
 * Date: 06.07.2019
 * Time: 14:44
 */

namespace App\Http\Controllers;


use App\Application;
use App\Provider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;


class ApplicationController extends Controller
{
    public function index(){
        return view('applications.index', ['apps' => Application::all()]);
    }

    public function item(Request $request, Provider $provider, Application $application){
        return view('applications.item', ['application' => $application]);
    }

    public function my_index(Request $request, Provider $provider, Application $application){
        return view('applications.index', ['apps' => Application::whereHas('states', function ($q) use ($provider){
            $q->where('applications_states.executor_id', Auth::user()->id)->where('applications_states.finished', 0);
        })->get()]);
    }

}