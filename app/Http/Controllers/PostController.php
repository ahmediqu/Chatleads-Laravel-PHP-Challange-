<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Films;
use App\Comment;
use Session;
use DB;
use Auth;
class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [];
        $data['flims'] = Films::orderBy('id','desc')->paginate(3);
        return view('flims.index',$data);
    }
    public function details($slug)
    {

        $data = [];
        $data['flims'] = Films::findOrFail($slug);

        // $data['commnets'] = Comment::where('flims_id',$data['flims']->id)->get();
        $data['commnets'] = DB::table('comments')
        ->select('users.name as userName','comments.comment')
        ->leftJoin('users','users.id','=','comments.user_id')
        ->leftJoin('films','films.id','=','comments.flims_id')
        ->where('films.id',$data['flims']->id)
        ->get();
        return view('flims.details',$data);
    }

    public function saveComment(Request $request){

        $c = new Comment();
        $c->user_id = Auth::user()->id;
        $c->flims_id = $request->flims_id;
        $c->comment = $request->comment;
        Session::flash('message','Thank you for your comment');
        $c->save();

        return back();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        
    }

    public function getData(){
       

    }
}
