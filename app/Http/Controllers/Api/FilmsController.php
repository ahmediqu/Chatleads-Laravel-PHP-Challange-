<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Films;
use Illuminate\Support\Facades\Validator;
use Session;
use Response;
use Illuminate\Support\Str;
class FilmsController extends Controller
{
    public function index(){
    	return "hello";
    }

    public function setTitleAttribute($value)
	{
	    $this->attributes->name = $value;
	    $this->attributes->slug = str_slug($value);
	}

    public function store(Request $request){
    
        $validator = Validator::make($request->all(), [ 
			'name' => ['required'],
			'description' => ['required'],
			'release' => ['required'],
			// 'date' => ['required'],
			'ticket' => ['required'],
			'slug' => 'unique:films',
			'price' => ['required'],
			'country' => ['required'],
			'genre' => ['required'],
			'photo' => ['required'],
           
        ]);
		if ($validator->fails()) { 
		    return response()->json(['error'=>$validator->errors()], 401);            
		}
		$input = $request->all(); 
		$input['slug'] =  Str::slug($request->name);
        $photo = $request->file('photo');
        if ($photo) {
            $image_name = time().'.'.request()->photo->getClientOriginalExtension();
            $image_full_name = $image_name;
            $destination_path = 'uploads/films/';
            $image_url = $destination_path . $image_full_name;
            $success = $request->file('photo')->move($destination_path, $image_full_name);
            if ($success) {
                $input->photo = $image_url;
            }
        }
		
		$films = Films::create($input); 
		//$success['token'] =  $films->createToken('MyApp')->accessToken; 
		$success['name'] =  $films->name;
        //Mail::to($input['email'])->send( new ApiMail($user));
        //Session::put('user',$user);
		return Response::json(array(
		    'message' => 'Films successfully Created',
		    'error' =>false,
		    'films' => $films,
		));	 
    }
}
