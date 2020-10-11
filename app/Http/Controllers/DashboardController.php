<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PartModel;
class DashboardController extends Controller
{
    //
    public function indexAction(Request $request){
    	

    	if(isset($request->buy)){
    		$part = PartModel::find($request->buy);
    		if ($part) {
    			$part->status=1;
    			$part->save();
    		}
    	}

    	$parts = PartModel::where("status",0)->get();

    	return view('main')->with('parts',$parts);
    }
}
