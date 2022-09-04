<?php

namespace App\Http\Controllers\Buyer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Models\Produce;
use App\Models\Carts;
use Darryldecode\Cart\Cart;
use Session;
use Auth;

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
        public function forecast(){
            // dd(Auth::user()->id);
            $url='https://content.api.nytimes.com/svc/weather/v2/current-and-seven-day-forecast.json';
            $data=file_get_contents($url);
            //file_put_contents($cache_file, $data);
            $data=json_decode($data);
            $current=$data->results->current[0];
            $forecast=$data->results->seven_day_forecast;
            // dd($forecast,$current);
            return view('buyer.Forecast',compact('forecast','current'));
        }
        public function predict(){
            
            return view('buyer.predict');
        }
        public function profile(Request $request){
        $user = Auth::user();
        
        return view('buyer.profile', compact('user'));
    }

        public function updateuser(Request $request){
            // dd($request->all());
        $request->validate([
            'name'=>'required',
            'email'=>'required',
            'contact' => 'required',
        ]);
        $user = Auth::user();
        $user->name = $request->get("name");
        $user->email = $request->get("email");
        $user->contact = $request->get("contact");
        $user->Country = $request->get("Country");
         $user->name = $request->get("name");
        $user->City = $request->get("City");
        $user->address = $request->get("address");

        if($request->has("photo")){
            $photo = request()->file('photo');
            $photo->move(public_path('photos'), $imageName);
            $user->photo = 'photos/'.$imageName;
        }
        $user->update();
        return back()->with("success", __('profile updated_successfully'));
    }
     public function profile_pass(Request $request){
        $user = Auth::user();
        
        return view('buyer.change_password', compact('user'));
    }

      public function change_user(Request $request){
        $request->validate([
            'old_password' => ['required'],
            'new_password' => ['required'],
            'new_confirm_password' => ['same:new_password'],
        ]);
        // dd(bcrypt('password'),Hash::make('password'));
        if (Hash::check($request->old_password,auth()->user()->password)) {
            $user = Auth::user();
           $user->password = Hash::make($request->get('password'));
           $user->update();
           Auth::logout();
        $request->session()->invalidate();
        return redirect()->route('login')->with("success",'password updated successfully');
            // dd('password match');
        }else{
            return back()->with("error",'password does not match');
        }
    }
    public function getOrders()
    {
        $cartd=DB::table('carts')->where('user_id',Auth::user()->id)->count();
        $orders =DB::table('orders')->where('user_id',Auth::user()->id)->get();
        // dd($orders);

        return view('buyer.order_made', compact('orders'))->withCartd($cartd);
    }

    public function cart()  {
        $cartCollection = \Cart::getContent();
        // dd($cartCollection);
        return view('cart')->withTitle('E-COMMERCE STORE | CART')->with(['cartCollection' => $cartCollection]);;
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
            $update_qty= $incre_items+$incre_item;
            dd($update_qty);

   
           $Produce_up = Produce::find($id);
           $Produce_up->quantity = $update_qty;
           $Produce_up->save();
            
           }
            
            


          $user = Carts::where('product_id', $id)->firstorfail()->delete();
          
          return redirect()->back()->with("item Record removed successfully from cart!.")->withCartd($cartd);
       }


    public function index()
    {
        //
        $cartd=DB::table('carts')->where('user_id',Auth::user()->id)->count();
        
        return view('buyer.index')->withCartd($cartd);
    }

    public function warehouse(){
        $cartd=DB::table('carts')->where('user_id',Auth::user()->id)->count();
        $countries=DB::table('countries')->get();
       $ware_hous=DB::table('warehouses')->get();
       $ware_house=DB::table('users')->where(['user_type'=>'ware_house'])->get();
       // dd($ware_house,$ware_hous);
        return view('buyer.house',compact('countries','ware_house','ware_hous'))->withCartd($cartd);
    }



    public function cart_buyer()
    {
        //
        $cartd=DB::table('carts')->where('user_id',Auth::user()->id)->count();

         dd($cartd);
        $warehouses=DB::table('warehouses')->get();
        $produ=DB::table('produces')->get();
        return view('buyer.shop',compact('warehouses','produ'))->withCartd($cartd);
    }

    public function cartst()
    {
         $cartd=DB::table('carts')->where('user_id',Auth::user()->id)->count();

         dd($cartd);
        // $cartd=\Cart::session(auth()->id())->getContent();
        $cart=DB::table('carts')->where('user_id',Auth::user()->id)->get();
        return view('buyer.cart')->with(compact('cart'))->withCartd($cartd);
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
            session()->flash('success', 'Cart updated successfully');
        }
    }
    public function remove(Request $request)
    {
        if($request->id) {
            $cart = session()->get('buyer.Add_cart');
            if(isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('buyer.Add_cart', $cart);
            }
            session()->flash('success', 'Product removed successfully');
        }
    }
}
