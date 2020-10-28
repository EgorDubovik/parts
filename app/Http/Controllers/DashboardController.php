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
            $part_info = $getPartsInfo->test($part->part_number);
            if($part_info['available']){
                if($part_info['inStock']){
                    // $part->colorStatus = 'text-success';
                    // $part->stockStatus = 'inStock';
                    foreach ($part_info['warehouses'] as $warehouse) {
                        if($warehouse['warehouseCode']==118 && $warehouse['quantity']>0){
                            $part->colorStatus = 'text-success';
                            $part->stockStatus = 'Richardson <b>'.$warehouse['quantity'].'</b> ('.$part_info['totalqty'].')';
                            break;
                        } else {
                            $part->colorStatus = 'text-warning';
                            $part->stockStatus = 'Else warehouses <b>'.$part_info['totalqty'].'</b>';
                        }
                    }
                    
                } else {
                    $part->colorStatus = 'text-danger';
                    $part->stockStatus = 'Back Order';    
                }
            } else {
                $part->colorStatus = 'text-muted';
                $part->stockStatus = 'Undefined';
            }
			//$part->job_number = $part_info['available'];    		
    	}

    	return view('main')->with('parts',$parts);
    }
}
