<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DeleteController extends Controller
{
    //
    public function distore(Request $request)
    {
    	# code...
    	$id     = $request->id;
    	$key     = $request->key;
    	$model  = $request->model;
    	$model  = 'App/'.$model;
    	$model  = str_replace('/', '\ ', $model);
    	$model  = str_replace(' ', '', $model);
    	// return $model;


    	$row = $model::find($id);
    	// return $key;

    	if ($row->key == $key) {
    		# code...
	    	$delete = $row->delete();

	    	if ($delete) {
	    		# code...
	    		return Response()->json([
	    			'type'    =>  'ok',
	    		]);
	    	}else {
	    		return Response()->json([
	    			'error'   =>  'error in update',
	    		]);
	    	}
    	}else {
    		return Response()->json([
	    			'error'   =>  'error in find row',
	    		]);
    	}

    }
}
