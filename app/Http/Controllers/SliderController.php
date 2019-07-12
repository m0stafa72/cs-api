<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\slider;

class SliderController extends Controller
{
    //


    public function index()
    {
    	# code...
    	$sliders = slider::all(['title','image','status']);
    	
    	return view('slider.index',compact('sliders'));
    }
}
