<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;

use App\Film;
use App\Comments;
/**
* 
*/

class FilmController extends Controller
{

	public function List(){
		return response()->json(Film::all(), 200);
	}

	public function Add(Request $request){
		if(Film::create($request->all()))
        	return response()->json(['code'=>'success','msg' => 'Added Successfully.'], 200);
        else
        	return response()->json(['code'=>'danger','msg' => 'Unable to Add.'], 200);
	}

	public function getFilmInfo($slug){
		$slug = str_replace('_', ' ', $slug);
		$response = DB::table('films')->where('name', $slug)->first();
		return response()->json($response, 200);
	}

	public function addComment(Request $request){
		if(Comments::create($request->all()))
        	return response()->json(['code'=>'success','msg' => 'Comment Added Successfully.'], 200);
        else
        	return response()->json(['code'=>'danger','msg' => 'Unable to Add.'], 200);
	}
}

?>