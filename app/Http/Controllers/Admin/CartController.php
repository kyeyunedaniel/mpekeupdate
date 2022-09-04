<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Produce;
use Auth;
use DB;
use App\Models\Advert;
use App\Models\Warehouse;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function delete_advert(Request $request){
        // dd($request->id);
        $products=Advert::findOrFail($request->id);
        $products->status ='0';
        $products->save();
        return back()->with('success', 'Your  updated the advert status successfully');
    }

    public function search(Request $request){
    // Get the search value from the request
    $search = $request->input('search');

    // Search in the title and body columns from the posts table
    $posts = Warehouse::query()
        ->where('name', 'LIKE', "%{$search}%")
        ->orWhere('district', 'LIKE', "%{$search}%")
        ->get();

    // Return the search view with the resluts compacted
    return view('search', compact('posts'));
}

    public function shop()
    {
        $products = Produce::all();
        // dd($products);
        $cartd=DB::table('carts')->where('user_id',Auth::user()->id)->count();
        return view('admin.admin.shop')->withTitle('E-COMMERCE STORE | SHOP')->with(['products' => $products])->withCartd($cartd);
    }


    public function cart()  {
        $cartCollection = \Cart::getContent();
        // dd( $cartCollection = \Cart::getContent());
        $cartd=DB::table('carts')->where('user_id',Auth::user()->id)->count();
        return view('admin.admin.cart')->withTitle('E-COMMERCE STORE | CART')->with(['cartCollection' => $cartCollection])->withCartd($cartd);
    }
     public function add(Request $request){
        // dd(auth()->id());
         $request->validate([
            'name' => 'required',
            'price' => 'required',
            'quantity' => 'required'
        ]);

        \Cart::add(array(
            'id' => $request->id,
            'name' => $request->name,
            'price' => $request->price,
            'quantity' => $request->quantity,
            
        ));
        
        return redirect()->route('index.index')->with('success_msg', 'product is Added to Cart!');
    }

   public function advert_list(){
        $products=Advert::all();
        // dd($products);
        return view('admin.admin.advert',compact('products'));
    }

           public function store_advert (Request $request)
    {
        // dd($request->all());
        if($request->has("logo")){
            $photo = $request->file('logo');
            $imageName = $request->get("name").'.'.$photo->getClientOriginalExtension();
            $photo->move(public_path('advert_logo'), $imageName);
        }
        $user = Advert::create([
            'partner_name' => $request->name,
            'image' => 'advert_logo/'.$imageName,
            'url'=>$request->url,
        ]);

        return back()->with('product', 'You have saved a product details');
    }

     public function advert_edit(Request $request)
    {
        //
        $products=Advert::findOrFail($request->id);
        $products->partner_name = $request->name;
        $products->url=$request->url;
         

         if($request->has("logo")){
            $photo = $request->file('logo');
            $imageName = $request->get("name").'.'.$photo->getClientOriginalExtension();
            $photo->move(public_path('products_logo'), $imageName);
            $products->image ='products_logo/'.$imageName;
        }

         $products->save();
        return back()->with('success', 'Your edit is saved successfully');
        
    }

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
        return redirect()->route('index.index')->with('success_msg', 'Item is removed!');
    }

    public function update(Request $request){

        //         if($request->id and $request->quantity)
        // {
        //     $cart = session()->get('cart');

        //     $cart[$request->id]["quantity"] = $request->quantity;

        //     session()->put('cart', $cart);

        //     $subTotal = $cart[$request->id]['quantity'] * $cart[$request->id]['price'];

        //     $total = $this->getCartTotal();

        //     $htmlCart = view('_header_cart')->render();

        //     return response()->json(['msg' => 'Cart updated successfully', 'data' => $htmlCart, 'total' => $total, 'subTotal' => $subTotal]);

        //     //session()->flash('success', 'Cart updated successfully');
        // }
        \Cart::update($request->id,
            array(
                'quantity' => array(
                    'relative' => false,
                    'value' => $request->quantity
                ),
        ));
        return redirect()->route('admin.cart.indexd')->with('success_msg', 'Cart is Updated!');
    }

    public function clear(){
        \Cart::clear();
        return redirect()->route('admin.cart')->with('success_msg', 'Car is cleared!');
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
