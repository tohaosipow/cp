<?php
/**
 * Created by PhpStorm.
 * User: tohao
 * Date: 06.07.2019
 * Time: 17:21
 */

namespace App\Http\Controllers;


use App\Application;
use App\Provider;

class DashboardController extends Controller
{
    public function index(Provider $provider){
        return view('dashboard.index', ['applications' => Application::all()]);
    }

}