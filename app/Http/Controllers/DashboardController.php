<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PartModel;
class DashboardController extends Controller
{
    //
    public function indexAction(){
    	
    	return view('main');
    }
}
