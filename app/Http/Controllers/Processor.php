<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;

class Processor extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function __construct()
    {
        $this->middleware('auth');
    }
    public function profile(Request $request){
        $user = Auth::user();
        
        return view('processor.profile', compact('user'));
    }

    public function index()
    {
        // 
         return view('processor.processor');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $products=DB::table('transporters')->where('user_id',Auth::user()->id)->get();
        return view('processor.index',compact('products'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        // dd($request->all());

             if($request->has("image")){
                $photo = $request->file('image');
                $imageName = $request->get("name").'.'.$photo->getClientOriginalExtension(); 
                $photo->move(public_path('photos'), $imageName);
                $photoPath = 'photos/'.$imageName;           
            
               }

             // dd($photoPath);
               $Processor = new Processor ([
                    'name' => $request->name,
                    'category' =>$request->Category,
                    'Location' =>$request->Location,
                    'description' =>$request->action,
                    'user_id' =>Auth::user()->id,
                    'image'  =>'photos/'.$imageName
                ]);
                

                return back();
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
