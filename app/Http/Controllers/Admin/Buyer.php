<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Auth;
use App\Models\User;
use App\Models\Produce;

class Buyer extends Controller
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


    public function Remove_cart($id) 
       {

            $cart_ups= Carts::where(['id'=>$id,'user_id'=>Auth::user()->id])->get();
            $cart_remove= Produce::where(['id'=>$id])->get();
           foreach ($cart_ups  as $value) {
               # code...
            $incre_item=0;
            $incre_item=(int)$value->quantity;
            
           }
           foreach ($cart_remove  as $values) {
               # code...
            $incre_items=0;
            $incre_items=(int)$values->quantity;
            
           }
            $update_qty= $incre_items+$incre_item;
            dd($update_qty);

   
           $Produce_up = Produce::find($id);
           $Produce_up->quantity = $update_qty;
           $Produce_up->save();


          $user = Carts::where('id', $id)->firstorfail()->delete();
          
          return redirect()->back()->with("item Record removed successfully from cart!.")->withCartd($cartd);
       }


    public function index()
    {
        //

        $cartd=DB::table('carts')->where('user_id',Auth::user()->id)->count();
        $buy=DB::table('users')->where(['user_type'=>'buyer'])->get();
        return view('admin.buyer.index',compact('buy'))->withCartd($cartd);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //  4
        // dd();
        $Grain=DB::table('warehouses')->distinct()->get();
         $countries=DB::table('warehouses')->get();
        // $employee = Produce::findOrFail($id);
         $employee = User::findOrFail($id);
         $cartd=DB::table('carts')->where('user_id',Auth::user()->id)->count();
        
        return view('admin.farmer.edit',compact('employee','countries','Grain'))->withCartd($cartd);
    }

     public function editd($id)
    {
        dd(\Cart::getContent());
        $employee = Produce::findOrFail($id);
        dd($employee);
         $Grain=DB::table('warehouses')->distinct()->get();
         $countries=DB::table('warehouses')->get();
        //  $this->setPageTitle('Employee', 'Edit Employee');
        return view('admin.farmer.edit', compact('employee','Grain','countries'));
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
