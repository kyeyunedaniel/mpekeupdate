<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Models\Produce;
use App\Models\Carts;
use Darryldecode\Cart\Cart;
use Session;
use Auth;
use Illuminate\Support\Facades\Hash;
use App\Rules\MatchOldPassword;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Validator;
use App\Models\Order;
use Notification;
use App\Notifications\BillingNotification;
use Carbon\Carbon;


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
            $ramal = 0;
            $akurasi = 0;
            $persen=0;
            
            return view('admin.Forecast', [
            'ramal'=> $ramal,
            'akurasi' => $akurasi,
            'persen'=>$persen
        ]);
        }

         public function store_partner(Request $request)
        {
            // dd($request->all());
            if($request->has("logo")){
                $photo = $request->file('logo');
                $imageName = $request->get("name").'.'.$photo->getClientOriginalExtension();
                $photo->move(public_path('products_logo'), $imageName);
            }
            $user = Partner::create([
                'partner_name' => $request->name,
                'image' => 'products_logo/'.$imageName,
            ]);

            return back()->with('product', 'You have saved a product details');
        }
        public function partner_list()
        {
            $products=Partner::all();
            // dd($products);
            return view('admin.partner',compact('products'));
         }

         public function partner_edit(Request $request)
        {
            //
            $products=Partner::findOrFail($request->id);
            $products->partner_name = $request->name;
             

             if($request->has("logo")){
                $photo = $request->file('logo');
                $imageName = $request->get("name").'.'.$photo->getClientOriginalExtension();
                $photo->move(public_path('products_logo'), $imageName);
                $products->image ='products_logo/'.$imageName;
            }

             $products->save();
            return back()->with('success', 'Your edit is saved successfully');
            
        }

        public function predict(){
            $url='https://content.api.nytimes.com/svc/weather/v2/current-and-seven-day-forecast.json';
            $data=file_get_contents($url);
            //file_put_contents($cache_file, $data);
            $data=json_decode($data);
            $current=$data->results->current[0];
            $forecast=$data->results->seven_day_forecast;
            // dd($forecast,$current);
            
            return view('admin.predict',compact('forecast','current'));
        }
    public function profile(Request $request){
        $user = Auth::user();
        
        return view('admin.profile', compact('user'));
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
        $user->NIN = $request->get("NIN");

          if($request->has("trading_license")){
            $dl=Auth::user()->id.'.'.'trading_license';
            $photo = request()->file('trading_license');
            $imageName = $dl.'.'.$photo->getClientOriginalExtension();
            $photo->move(public_path('photos'), $imageName);
            $user->trading_license = 'photos/'.$imageName;
        }

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
        
        return view('admin.change_password', compact('user'));
    }

      public function change_user(Request $request){

        // $request->validate([
        //     'current_password' => ['required', new MatchOldPassword],
        //     'new_password' => ['required'],
        //     'new_confirm_password' => ['same:new_password'],
        // ]);

        // User::find(auth()->user()->id)->update(['password'=> Hash::make($request->new_password)]);


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
        $orders =DB::table('orders')->where('user_id',Auth::user()->id)->get();
        // dd($orders);

        return view('admin.admin.order_made', compact('orders'));
    }

    public function admin()
    {
        //
        $cartd=DB::table('carts')->where('user_id',Auth::user()->id)->count();
        $admin=DB::table('users')->where(['user_type'=>'admin'])->get();
        return view('admin.admin.index',compact('admin'))->withCartd($cartd);
    }

     public function index_buyer()
    {
        //
        $cartd=DB::table('carts')->where('user_id',Auth::user()->id)->count();
        
        return view('buyer.index')->withCartd($cartd);
    }


    public function index()
    {
        //
         $last = DB::table('orders')->latest()->first();
           $laste= Order::where('user_id', Auth::user()->id)->latest()->get()->first();
           $record= Order::where('user_id', Auth::user()->id)->get();
            // dd($laste['transref']);


           $apikey='4bc0399d01e32551328f12eb9cb137c1de6006365f970a38c64a4b4fcf412881';
           // $transref='fb4f978b-591d-4d78-b7ce-32e4e285c4c2';
           foreach ($record as  $value) {
               // code...
            $transref="82278aad-2e96-4673-a164-9304acd48d63";
           }
           $pp=$laste['transref'];
           $phone_number=$laste['payment_method'];

             if($laste['payment_method']=='airtelmoney'){
                 
                 // code...
               dd( $curl = curl_init());
              curl_setopt_array($curl, array(
              CURLOPT_URL => 'https://springpesa.com/developer/api/mobilemoney/?query=airtelmoney',
              CURLOPT_RETURNTRANSFER => true,
              CURLOPT_ENCODING => '',
              CURLOPT_MAXREDIRS => 10,
              CURLOPT_TIMEOUT => 0,
              CURLOPT_FOLLOWLOCATION => true,
              CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
              CURLOPT_CUSTOMREQUEST => 'POST',
              CURLOPT_POSTFIELDS =>'apikey=$apikey&transref=$pp&action=creditwallet',
              CURLOPT_HTTPHEADER => array(
                'Content-Type: application/x-www-form-urlencoded'
              ),
            ));

            $response = curl_exec($curl);
            $products = Produce::all();


            curl_close($curl);

            // dd(Carbon::now()->format('Y-m-d H:i:s'));
            
            // return redirect()->route('admin.cart',compact('response'))->with('alert', 'A payment notification was sent to your number,please enter pin to authorize payment!');

            // if ($response) {
                // code...
                if (json_decode($response)->status=='SUCCESS') {
                // dd(json_decode($response));
                      //gettting the latest inserted order by the client
                      $laste= Order::where('user_id', Auth::user()->id)->latest()->get()->first();
                      //updating the Order table after succesfully data sent to api dashboard
                        $product_order = Order::find($laste['id']);
                        $product_order->TransactionID = json_decode($response)->TxnId;
                        $product_order->TransTime = Carbon::now()->format('Y-m-d H:i:s');
                        $product_order->save();
                        $products = Produce::all();
                        // return view('admin.TransTrans',compact('response'))->with('success', 'A payment notification was sent to,'.''.$resp->message.''.' your number,please enter pin to authorize payment!')->with('displ');

            }
            // else{

            //      $cartd=DB::table('carts')->where('user_id',Auth::user()->id)->count();
            //     return redirect()->route('admin.cart')->withTitle('E-COMMERCE STORE | SHOP')->with(['products' => $products])->with('success','Transaction failed please try again!')->withCartd($cartd);
            //         }
                //     }else{
                //          $cartd=DB::table('carts')->where('user_id',Auth::user()->id)->count();
                // return redirect()->route('admin.cart')->withTitle('E-COMMERCE STORE | SHOP')->with(['products' => $products])->withCartd($cartd)->with('success','Transaction failed please try again!');
                //     }

         }
         
//          else{

// // dd($transref,$pp);
//             $ppk='8fd59f8d-0b2b-42d0-8f09-d5f1f58f2ac3';
//             // $curl = curl_init();
//             dd( $curl = curl_init());
//              curl_setopt_array($curl, array(
//               CURLOPT_URL => 'https://springpesa.com/developer/api/mobilemoney/?query=mtnmoney',
//               CURLOPT_RETURNTRANSFER => true,
//               CURLOPT_ENCODING => '',
//               CURLOPT_MAXREDIRS => 10,
//               CURLOPT_TIMEOUT => 0,
//               CURLOPT_FOLLOWLOCATION => true,
//               CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
//               CURLOPT_CUSTOMREQUEST => 'POST',
//               CURLOPT_POSTFIELDS => 'apikey=4bc0399d01e32551328f12eb9cb137c1de6006365f970a38c64a4b4fcf412881&transref=$pp&action=creditwallet',
//               CURLOPT_HTTPHEADER => array(
//                 'Content-Type: application/x-www-form-urlencoded'
//               ),
//             ));

//             $response = curl_exec($curl); 
//             $sta=json_decode($response);        

//             curl_close($curl);
//            if ($sta) {
//                // code...
//                  if (json_decode($response)->status == 'SUCCESS') {
//                 // dd($response,'sux');
//                      $laste= Order::where('user_id', Auth::user()->id)->latest()->get()->first();
//                       //updating the Order table after succesfully data sent to api dashboard
//                         $product_order = Order::find($laste['id']);
//                         $product_order->TransactionID = json_decode($response)->TxnId;
//                         $product_order->TransTime = Carbon::now()->format('Y-m-d H:i:s');
//                         $product_order->save();
//                         $products = Produce::all();

                    
            
//             }
//            }
//         }
         $warehouses=DB::table('warehouses')->count();
          $farmer=DB::table('users')->where('user_type','farmer')->count();
          $admin=DB::table('users')->where('user_type','admin')->count();
          $buyer=DB::table('users')->where('user_type','buyer')->count();
        $cartd=DB::table('carts')->where('user_id',Auth::user()->id)->count();

        return view('admin.index',compact('warehouses'))->withCartd($cartd)->withAdmin($admin)->withFarmer($farmer)->withWarehouse($warehouses)->withBuyer($buyer);
    }
    public function cart_buyer()
    {
        //
        $cartd=DB::table('carts')->where('user_id',Auth::user()->id)->count();

         // dd($cartd);
        $warehouses=DB::table('warehouses')->get();
        $produ=DB::table('produces')->get();
        return view('buyer.shop',compact('warehouses','produ'))->withCartd($cartd);
    }

    public function cartst()
    {
         $cartd=DB::table('carts')->where('user_id',Auth::user()->id)->count();
         // dd($cartd);
        // $cartd=\Cart::session(auth()->id())->getContent();
        $cart=DB::table('carts')->where('user_id',Auth::user()->id)->get();
        return view('buyer.cart')->with(compact('cart'))->withCartd($cartd);
    }

    public function cart()
    {
        //
        $cartd=DB::table('carts')->where('user_id',Auth::user()->id)->count();
        $warehouses=DB::table('warehouses')->get();
        $produ=DB::table('produces')->get();
        return view('admin.cart',compact('warehouses','produ'))->withCartd($cartd);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $cartd=DB::table('carts')->where('user_id',Auth::user()->id)->count();
        return view('admin.create')->withCartd($cartd);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
     
    public function store(Request $request)
    {
        $kind = $request->input('kind');
        $firstName = $request->input('fname');
        $last_name = $request->input('lname');
        $email = $request->input('email');
        $password = $request->input('password');
        $user_name = $request->input('Username');

        $contact = $request->input('tagline');
        $photo = $request->input('photo'); 
        $photos="photos/username.png";
    

        $data=array('user_type'=>$kind,'name'=>$firstName." ".$last_name,'email'=>$email,'username'=>$user_name,'contact'=>$contact,'photo'=>$photos, 'password'=>$password);
        DB::table('users')->insert($data);
        return redirect('/admin')->with('success','User Added Successfully');

    //     //

    //     $employee =$request->validate([
    //         'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
    //         'password' => ['required', 'string', 'min:8', 'confirmed']
                
    //         ]);
    //     // dd($employee);
       
    //     $fullname=$request->fname.'_'.$request->lname;

    //          if($request->has("image")){
    //             $photo = $request->file('image');
    //             $imageName = $request->get("email").'.'.$photo->getClientOriginalExtension(); 
    //             $photo->move(public_path('photos'), $imageName);
    //             $photoPath = 'photos/'.$imageName;           
            
    //            }

    //          dd($request->all());

        
    //    User::create([
    //         'name' => $fullname,
    //         'username' =>$request->Username,
    //         'contact' =>$request->tagline,
    //         'email' =>$request->email,
    //         'user_type' =>$request->kind,
    //         'password' => Hash::make($request->password),
    //         'photo'  =>'photos/'.$imageName
    //     ]);
    //     $cartd=DB::table('carts')->where('user_id',Auth::user()->id)->count();
    //     return back()->with('Account created successfully','success',false, false);

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
        $employee = User::findOrFail($id);
        // dd($employee);
         $Grain=DB::table('warehouses')->distinct()->get();
         $countries=DB::table('warehouses')->get();
        //  $this->setPageTitle('Employee', 'Edit Employee');
        return view('admin.admin.edit', compact('employee','Grain','countries'));
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
        //
        $employee = $request->validate([

             'fname'          =>  'required |max:191'
                        
            ]);
        $comp = User::find($request->id);
        // dd($comp);

                $comp->name = $request->fname;
                $comp->email = $request->email;
                $comp->user_type = $request->kind;
                $comp->contact = $request->tagline;
                $comp->username = $request->Username;


            if($request->has("logo")){
            $photo = $request->file('logo');
            $imageName = $request->get("email").'.'.$photo->getClientOriginalExtension();
            $photo->move(public_path('photos'), $imageName);
            $comp->photo = 'photos/'.$imageName;
            // dd('images/profile_photos/'.$imageName);
        }

        $comp->save();
       return redirect()->route('admin.admin.index')->with('Data updated successfully' ,'success');
    }

    public function addToCartd(Request $request,$id)
    {
        // trial again
        // $cartCollection = \Cart::getContent();
        $cartCollection = \Cart::getContent();
        dd($cartCollection);



        // actual code
        $data=$request->all();
            dd($data);
        // dd($cart = session()->$request->all());
        $Check_qty=Produce::where(['id'=>$data['product_id']])->first()->toArray();
        // dd((int)$Check_qty['quantity']);
        if ((int)$Check_qty['quantity']<(int)$data['quantity']) {
            # code...
            $message='Required quantity is not available';
            // dd($message);
            session::flash('error_message',$message);
            return redirect()->back();
        }
        //check product existance in cart
        $cart_exi=Carts::where(['product_id'=>$data['product_id'],'user_id'=>Auth::user()->id])->count();
        // dd($cart_exi);
        if ($cart_exi>0) {
            # code...
           
           $cart_up= Carts::whereId(['product_id'=>$data['product_id'],'user_id'=>Auth::user()->id])->first();
           $cart_ups= Carts::where(['product_id'=>$data['product_id'],'user_id'=>Auth::user()->id])->get();
           foreach ($cart_ups  as $value) {
               # code...
            $incre_item=0;
            $incre_item=(int)$value->quantity+(int)$data['quantity'];
            
           }
            $update_qty= (int)$Check_qty['quantity']-(int)$data['quantity'];

   
       $Produce_up = Produce::find($data['product_id']);
       $Produce_up->quantity = $update_qty;
       $Produce_up->save();
           // dd($incre_item);
            $cart_up->quantity = $incre_item;
            $cart_up->save();
            // dd( $comp = Carts::find($data['product_id'],'user_id'->Auth::user()->id));
             $message='product already exists in cart';
            // dd($message);
             
        $cartd=DB::table('carts')->where('user_id',Auth::user()->id)->count();
            session::flash('error_message',$message);
            return redirect()->back()->with('success','product has been successfully added in cart')->withCartd($cartd);
        }
       $update_qty= (int)$Check_qty['quantity']-(int)$data['quantity'];

   
       $Produce_up = Produce::find($data['product_id']);
       $Produce_up->quantity = $update_qty;
       $Produce_up->save();

     

        //saving prod
        $save_cart = new Carts;
        $save_cart->user_id=Auth::user()->id;
        $save_cart->product_id=$data['product_id'];
        $save_cart->price=$data['price'];
        $save_cart->name=$data['name'];
        $save_cart->quantity=$data['quantity'];
        $save_cart->save();
         $message='product has been successfully added in cart';
            // dd($message);
         
            session::flash('error_message',$message);
            $cartd=DB::table('carts')->where('user_id',Auth::user()->id)->count();
            return redirect()->back()->with('success','product has been successfully added in cart')->withCartd($cartd);
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

    public function addToCart(Request $request){
        
        $data=$request->all();
            // dd(\Cart::session(auth()->id())->getContent());
        $Check_qty=Produce::where(['id'=>$data['product_id']])->first()->toArray();
        // dd((int)$Check_qty['quantity']);
        if ((int)$Check_qty['quantity']<(int)$data['quantity']) {
            # code...
            $message='Required quantity is not available';
            // dd($message);
            session::flash('error_message',$message);
            return redirect()->back();
        }
        //check product existance in cart
        $cart_exi=Carts::where(['product_id'=>$data['product_id'],'user_id'=>Auth::user()->id])->count();
        dd($cart_exi);
        if ($cart_exi>0) {
            # code...
           
           $cart_up= Carts::where(['product_id'=>$data['product_id'],'user_id'=>Auth::user()->id])->first();
           $cart_ups= Carts::where(['product_id'=>$data['product_id'],'user_id'=>Auth::user()->id])->get();
           foreach ($cart_ups  as $value) {
               # code...
            $incre_item=0;
            $incre_item=(int)$value->quantity+(int)$data['quantity'];
            
           }
            $update_qty= (int)$Check_qty['quantity']-(int)$data['quantity'];

   
       $Produce_up = Produce::find($data['product_id']);
       dd($incre_item);
       $Produce_up->quantity = $update_qty;
       $Produce_up->save();
           // dd($cart_up,$data);
            $cart_up->quantity = $incre_item;
            $cart_up->save();
            // dd( $comp = Carts::find($data['product_id'],'user_id'->Auth::user()->id));
             $message='product already exists in cart';
            // dd($message);
             
        $cartd=DB::table('carts')->where('user_id',Auth::user()->id)->count();
            session::flash('error_message',$message);
            return redirect()->back()->with('success','product has been successfully added in cart')->withCartd($cartd);
        }
       $update_qty= (int)$Check_qty['quantity']-(int)$data['quantity'];

   
       $Produce_up = Produce::find($data['product_id']);
       $Produce_up->quantity = $update_qty;
       $Produce_up->save();

     

        //saving prod
        $save_cart = new Carts;
        $save_cart->user_id=Auth::user()->id;
        $save_cart->product_id=$data['product_id'];
        $save_cart->price=$data['price'];
        $save_cart->name=$data['name'];
        $save_cart->quantity=$data['quantity'];
        $save_cart->save();
         $message='product has been successfully added in cart';
            // dd($message);
         $cartd=DB::table('carts')->where('user_id',Auth::user()->id)->count();
            session::flash('error_message',$message);
            return redirect()->back()->with('success','product has been successfully added in cart')->withCartd($cartd);

    }


    
    public function addToCarts(Produce $product)
    {
         // dd($product);

        $cart=Carts::with(['product'=>function($query){
                    $query->select('id','name');
                }])->where('user_id',Auth::user()->id)->orderBy('id','Desc')->get()->toArray();
        $cartd=DB::table('carts')->where('user_id',Auth::user()->id)->count();

         return redirect()->route('admin.cart.cart',compact('cart'))->with('success', 'Product added to cart successfully!')->withCartd($cartd);

            

            // add the product to cart 
       
       //  return redirect()->route('admin.cart.cart',compact('cart'))->with('success', 'Product added to cart successfully!');
            
    }
       public function addToCart_view(Produce $product,Request $request){
        // dd($request->all());
// 
        $cartd=DB::table('carts')->where('user_id',Auth::user()->id)->count();
        // $cartd=\Cart::session(auth()->id())->getContent();
        $cart=DB::table('carts')->where('user_id',Auth::user()->id)->get();
        // dd(Carts::usercartitam());
        // dd(Carts::find($data['product_id'],Auth::user()->id));
     
       return view('admin.carts')->with(compact('cart'))->withCartd($cartd);
    }

    public function Remove_cart($id) 
       {

            $cart_ups= Carts::where(['product_id'=>$id,'user_id'=>Auth::user()->id])->get();
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
          
          return redirect()->route('admin.carts')->with("product Record removed successfully from cart!.")->withCartd($cartd);
       }

       public  function removedata(Request $request)
    {
        dd($request->input('id'));
        $student = Student::find($request->input('id'));
        if($student->delete())
        {
            echo 'Data Deleted';
        }
    }
    
}
