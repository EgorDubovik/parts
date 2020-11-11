<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InsuranceController extends Controller
{
    public function actionAddinsurance(Request $request){
    	return view('insurance.addinsurance');
    }

    public function viewList(Request $request){
    	return view('insurance.list');
    }
}
