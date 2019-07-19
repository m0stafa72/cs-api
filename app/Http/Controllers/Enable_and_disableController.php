<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Enable_and_disableController extends Controller
{
    //
    public function EnableAndDisable(Request $request)
    {
    	# code...
    	$id     = $request->id;
    	$status = $request->status;
    	$model  = $request->model;
    	$model  = 'App/'.$model;
    	$model  = str_replace('/', '\ ', $model);
    	$model  = str_replace(' ', '', $model);
    	// return $model;

    	if ($status == 1 ) {
    		# code...
    		$newStatus = 0;
    	} else if($status == 0) {
    		$newStatus = 1;
    	}

    	$row = $model::find($id);

    	$update = $row->update([
    		'status'    =>   $newStatus,
    	]);

    	if ($update) {
    		# code...
    		return Response()->json([
    			'type'    =>  'ok',
    			'status'   =>  $newStatus,
    		]);
    	}else {
    		return Response()->json([
    			'error'   =>  'error in update',
    		]);
    	}



    }
}
