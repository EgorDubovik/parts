<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PartModel;

class PartController extends Controller
{
    //
    public function addPart(Request $request){

    	if (isset($request->event)) {
    		$part = new PartModel;
    		if($request->event=="add_part"){
    			$part->part_number = $request->part_number;
    			$part->job_number = $request->job_number;
    			$part->status = 0;
    			$saved = $part->save();
    		}
    	}

    	if(isset($saved)){
	    	if($saved){
	    		return redirect("/")->with('save_status',true);
	    	} else {
				return view("parts.addpart")->with('save_status',false);    		
	    	}
	    }

    	return view("parts.addpart");
    }
}
