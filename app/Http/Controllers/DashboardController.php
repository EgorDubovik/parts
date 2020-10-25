<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PartModel;
use App\Http\Helpers\GetPartsInfo;
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

    	$getPartsInfo = new GetPartsInfo();

    	$parts = PartModel::where("status",0)->get();

    	foreach ($parts as $part) {
			$part->job_number = $getPartsInfo->test();    		
    	}

    	return view('main')->with('parts',$parts);
    }
}
