<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\slider;
use Str;

class SliderController extends Controller
{
    //
	protected function GenrateToken() {

        $min=35;
        $max=45;
        $random = rand($min,$max);

        $token = Str::random($random);

        $unique_slider_key = slider::where('key' , '=' , $token)->first();

            if ($unique_slider_key) {
                # code...
               return $this->GenrateToken();
            } else {
                return $token;
            }    
        
    }

    public function index()
    {
    	# code...
    	$sliders = slider::all(['id','key','title','image','status']);
    	
    	return view('slider.index',compact('sliders'));
    }

    public function store(Request $request)
    {
    	# code...
    	$title = $request->title;
    	$description = $request->description;
    	$button = $request->button;
    	$link = $request->link;
    	$image = $request->file('image');
    	$key  = $this->GenrateToken();

    	if ($image) {
                # code...
                 
            $img_name = time().str_random(4).'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('images\sliders');
            $final = $image->move($destinationPath, $img_name);

             if ($final) {
                # code...
                $item = new slider([
                	'key'  =>   $key, 
                	'title'  =>   $title, 
                	'description'  =>   $description,
                	'button'  =>    $button,
                	'link'  =>     $link, 
                    'image'  => env('APP_URL').'/images/sliders/'.$img_name,
                ]);
                $save = $item->save();

                if ($save) {
                    # code...
                    return response()->json([
                        'status'  => 'ok',
                    ],200);
                }else{
                    return response()->json([
                        'status'  => 'error',
                        'error'   =>  'cant create new slider',
                    ],405);
                }
            }else{
                return response()->json([
                    'status'  => 'error',
                    'error'   =>  'no final',
                ],407);
            }

        }


    	// return $request->toArray();
    }
}
