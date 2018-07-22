<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Films;

use Auth;

class FilmsController extends Controller
{
    protected $API_URL = '';

    public function __construct()
    {
        return $this->API_URL = url('/lumen_API/public/api/');
    }
    public function index()
    {
    	$list = json_decode($this->getData());
        return view('films.list',['list' => $list]);
    }

    public function getData($O_url = ''){
        
        if(empty($O_url))
            $url = $this->API_URL.'/films';
        else
            $url = $O_url;

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $output = curl_exec ($ch);
        curl_close ($ch);
        return $output;
    }

    public function addfilm(Request $request){
        $validatedData = $request->validate([
                'name' => 'required',
                'description' => 'required',
                'release_date' => 'required',
                'rating' => 'required|numeric',
                'ticket_price' => 'required|numeric',
                'country' => 'required',
                'genre' => 'required',
                'photo' => 'required|max:5000|mimes:jpeg,jpg,png',
            ]);
            $file     = request()->file('photo');
            $fileName = md5(rand(1, 999)) . $file->getClientOriginalName();
            $request->file('photo')->move(public_path("/uploads"), $fileName);
            $User_data['name'] = request()->input('name');
            $User_data['description'] = request()->input('description');
            $User_data['release_date'] = request()->input('release_date');
            $User_data['rating'] = request()->input('rating');
            $User_data['ticket_price'] = request()->input('ticket_price');
            $User_data['country'] = request()->input('country');
            $User_data['genre'] = implode(', ', request()->input('genre'));
            $User_data['photo'] = url('/public/uploads/'.$fileName);
            $response = $this->setData($User_data, 'create');
            $msg = json_decode($response);
            return redirect()->back()->with($msg->code, $msg->msg);
    }
    public function setData($data, $method){
        $url = $this->API_URL.'/'.$method;
        $ch = curl_init($url);
        //curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
        curl_setopt($ch, CURLOPT_URL,$url);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $output = curl_exec ($ch);
        curl_close ($ch);
        return $output;
    }


    public function create(){
        return view('films.addFilm');
    }

    public function FilmInfo($slug)
    {
        $film_col = json_decode($this->getData($this->API_URL.'/detail/'.$slug));
        return view('films.detail',['info' => $film_col]);
    }

    public function Films()
    {
        $list = json_decode($this->getData());
        return view('films.list',['list' => $list]);
    }

    public function addComment(Request $request){
        if(!Auth::check())
            return redirect()->back()->with('danger', 'Please Login to add Comment.');
        else{
            $validatedData = $request->validate([
                'comment' => 'required',
            ]);
            $insertData['user_id'] = Auth::user()->id;
            $insertData['film_id'] = $request->input('film_id');
            $insertData['comment'] = $request->input('comment');
            $response = $this->setData($insertData, 'addComment');
            $msg = json_decode($response);
            return redirect()->back()->with($msg->code, $msg->msg);
        }
    }
}
