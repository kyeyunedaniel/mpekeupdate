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
        public function profile(Request $request){
        $user = Auth::user();
        
        return view('buyer.profile', compact('user'));
    }
         public function forecast(){
            $url='https://content.api.nytimes.com/svc/weather/v2/current-and-seven-day-forecast.json';
            $data=file_get_contents($url);
            $data=json_decode($data);
            $current=$data->results->current[0];
            $forecast=$data->results->seven_day_forecast;
            // dd($forecast,$current);
            return view('buyer.Forecast',compact('forecast','current'));
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
            $imageName = time().'.'.$photo->getClientOriginalExtension();
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
            'password' => 'confirmed',
        ]);
        $user = Auth::user();
        
        if($request->get('password') != ''){
            $user->password = Hash::make($request->get('password'));
        }        
        $user->update();
        return back()->with("success", __('Password updated successfully'));
    }
    public function getOrders()
    {
        $orders =DB::table('orders')->where('user_id',Auth::user()->id)->get();
        // dd($orders);

        return view('buyer.order_made', compact('orders'));
    }


    public function index_buyer()
    {
        //
        $cartd=DB::table('carts')->where('user_id',Auth::user()->id)->count();
        
        return view('buyer.index')->withCartd($cartd);
    }

        public function warehouse(){
        $countries=DB::table('countries')->get();
       $ware_hous=DB::table('warehouses')->get();
       $ware_house=DB::table('users')->where(['user_type'=>'ware_house'])->get();
       // dd($ware_house,$ware_hous);
        return view('buyer.house',compact('countries','ware_house','ware_hous'));
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
        $cart=DB::table('carts')->where('user_id',Auth::user()->id);
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
