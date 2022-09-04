<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produce;
use Auth;
use DB;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function shop()
    {
        $products = Produce::all();
        // dd($products);
        $cartd=DB::table('carts')->where('user_id',Auth::user()->id)->count();
        return view('buyer.shop')->withTitle('E-COMMERCE STORE | SHOP')->with(['products' => $products])->withCartd($cartd);
    }

    public function cart()  {
        $cartCollection = \Cart::getContent();
        // dd($cartCollection->quantity);
        $cartd=DB::table('carts')->where('user_id',Auth::user()->id)->count();
        return view('farmer.cart')->withTitle('E-COMMERCE STORE | CART')->with(['cartCollection' => $cartCollection])->withCartd($cartd);
    }
     public function add(Request$request){
        \Cart::add(array(
            'id' => $request->id,
            'name' => $request->name,
            'price' => $request->price,
            'quantity' => $request->quantity,
            
        ));
        return redirect()->route('cart.index')->with('success_msg', 'Item is Added to Cart!');
    }

    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   public function remove(Request $request){
        \Cart::remove($request->id);
        return redirect()->route('cart.index')->with('success_msg', 'Item is removed!');
    }

    public function update(Request $request){
        \Cart::update($request->id,
            array(
                'quantity' => array(
                    'relative' => false,
                    'value' => $request->quantity
                ),
        ));
        return redirect()->route('cart.index')->with('success_msg', 'Cart is Updated!');
    }

    public function clear(){
        \Cart::clear();
        return redirect()->route('cart')->with('success_msg', 'Car is cleared!');
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
