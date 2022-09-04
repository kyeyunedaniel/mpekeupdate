<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Models\Produce;

class DashboardController extends Controller
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
     public function warehouse(){
        $countries=DB::table('countries')->get();
       $ware_hous=DB::table('warehouses')->get();
       $ware_house=DB::table('users')->where(['user_type'=>'ware_house'])->get();
       // dd($ware_house,$ware_hous);
        return view('buyer.house',compact('countries','ware_house','ware_hous'));
    }


    public function index()
    {
        //
        return view('buyer.index');
    }

    public function cart()
    {
        //
        $warehouses=DB::table('warehouses')->get();
        $produ=DB::table('produces')->get();
        return view('buyer.shop',compact('warehouses','produ'));
    }

    public function carts()
    {
        return view('buyer.cart');
    }
    public function addToCart($id)
    {

         $product = Produce::find($id);
         // dd($product);
        if(!$product) {
            abort(404);
        }
        $cart = session()->get('buyer.cart');
        // if cart is empty then this the first product
        // dd($cart);
        if(!$cart) {
            $cart = [
                    $id => [
                        "name" => $product->name,
                        "quantity" => 1,
                        "price" => $product->price,
                        "photo" => $product->photo
                    ]
            ];


            session()->put('buyer.cart', $cart);
            return redirect()->back()->with('success', 'Product added to cart successfully!');
        }
        // if cart not empty then check if this product exist then increment quantity
        dd($cart);
        if(isset($cart[$id])) {
            $cart[$id]['quantity']++;
            session()->put('buyer.cart', $cart);
            return redirect()->back()->with('success', 'Product added to cart successfully!');
        }
        // if item not exist in cart then add to cart with quantity = 1
        $cart[$id] = [
            "name" => $product->name,
            "quantity" => 1,
            "price" => $product->price,
            "photo" => $product->photo
        ];

        // session()->put('buyer.cart', $cart);
       
        return redirect()->back()->with('success', 'Product added to cart successfully!');
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

    public function update_cart(Request $request)
    {
        if($request->id and $request->quantity)
        {
            $cart = session()->get('buyer.Add_cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('buyer.Add_cart', $cart);
        }
    }
    public function remove(Request $request)
    {
        if($request->id) {
            $cart = session()->get('buyer.Add_cart');
            if(isset($cart[$request->id])) {
                unset($cart[$request->id]);
            }
        }
    }

}
