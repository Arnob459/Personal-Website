<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Main;
use App\Models\service;
use App\Models\Portfolio;




class pagesController extends Controller
{
    //
    public function index(){
        $main = Main::first();
        $services = Service::all();
        $portfolios = Portfolio::all();

        return view('pages/index',compact('main','services','portfolios'));
    }
   
    public function Dashboard(){
        return view('pages/dashboard');
    }
    
    public function about(){
        return view('pages/about');
    }    
    
    public function contact(){
        return view('pages/contact');
    }
}
