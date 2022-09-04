<?php

namespace App\Http\Controllers\Admin;
use KingFlamez\Rave\Facades\Rave as Flutterwave;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Auth;
use App\Models\Order;
use App\Models\User;
use Notification;
use App\Models\Produce;
use Illuminate\Support\Facades\Session;
use App\Notifications\BillingNotification;
use Carbon\Carbon;


class FlutterwaveController extends Controller
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



    public function pin(){
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
                 // dd($transref,$pp);
                 // code...
                $curl = curl_init();
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

            if ($response) {
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
                        return view('admin.TransTrans',compact('response'))->with('success', 'A payment notification was sent to,'.''.$resp->message.''.' your number,please enter pin to authorize payment!')->with('displ');

            }else{

                 $cartd=DB::table('carts')->where('user_id',Auth::user()->id)->count();
                return redirect()->route('admin.cart')->withTitle('E-COMMERCE STORE | SHOP')->with(['products' => $products])->with('success','Transaction failed please try again!')->withCartd($cartd);
                    }
                    }else{
                         $cartd=DB::table('carts')->where('user_id',Auth::user()->id)->count();
                return redirect()->route('admin.cart')->withTitle('E-COMMERCE STORE | SHOP')->with(['products' => $products])->withCartd($cartd)->with('success','Transaction failed please try again!');
                    }

         }else{

// dd($transref,$pp);
            $curl = curl_init();
             curl_setopt_array($curl, array(
              CURLOPT_URL => 'https://springpesa.com/developer/api/mobilemoney/?query=mtnmoney',
              CURLOPT_RETURNTRANSFER => true,
              CURLOPT_ENCODING => '',
              CURLOPT_MAXREDIRS => 10,
              CURLOPT_TIMEOUT => 0,
              CURLOPT_FOLLOWLOCATION => true,
              CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
              CURLOPT_CUSTOMREQUEST => 'POST',
              CURLOPT_POSTFIELDS => 'apikey=4bc0399d01e32551328f12eb9cb137c1de6006365f970a38c64a4b4fcf412881&transref=82278aad-2e96-4673-a164-9304acd48d63&action=creditwallet',
              CURLOPT_HTTPHEADER => array(
                'Content-Type: application/x-www-form-urlencoded'
              ),
            ));

            $response = curl_exec($curl);         

            curl_close($curl);
              dd($response);
            
            
            // return redirect()->route('admin.cart',compact('response'))->with('alert', 'A payment notification was sent to your number,please enter pin to authorize payment!');

            if ($response) {
                // code...
                if (json_decode($response)->status == 'SUCCESS') {
                // dd($response,'sux');
                     $laste= Order::where('user_id', Auth::user()->id)->latest()->get()->first();
                      //updating the Order table after succesfully data sent to api dashboard
                        $product_order = Order::find($laste['id']);
                        $product_order->TransactionID = json_decode($response)->TxnId;
                        $product_order->TransTime = Carbon::now()->format('Y-m-d H:i:s');
                        $product_order->save();
                        $products = Produce::all();

                    
            }
            }
        }
        return view('admin.success');
    }

    public function Springpesa(Request $request){

        //notify the admin about the order

        $data = User::first();
        $laste= Order::where('user_id', Auth::user()->id)->latest()->get()->first();
        $name=Auth::user()->name;
  
        $billData = [
            'name' => 'MpekeXchange Order',
            'body' => 'You have received a new order from'.''.$name .''.'of'.''.$request->quantity.''.'kgs of'.''.$request->name,
            'text' => $request->quantity,
            'order_id' => $laste['order_number']
        ];
  
        // Notification::send($data, new BillingNotification($billData));

        
        $num=substr($request->phone_number,0,3);

        if($num=='077') {
            $curl = curl_init();
        // Set API access key
        $api_key="4bc0399d01e32551328f12eb9cb137c1de6006365f970a38c64a4b4fcf412881";
         
           //form data
        $data=[
            'access_key'=>'4bc0399d01e32551328f12eb9cb137c1de6006365f970a38c64a4b4fcf412881',
            'phone'=>$request->phone_number,
            'amount'=>$request->amount
        ];
        //variable name to handle data to api
        $mpeke='action=initiate&apikey=4bc0399d01e32551328f12eb9cb137c1de6006365f970a38c64a4b4fcf412881&phone='.''.$request->phone_number.''.'&amount='.''.$request->amount;
         curl_setopt($curl,CURLOPT_SSL_VERIFYHOST,0);
          curl_setopt($curl,CURLOPT_SSL_VERIFYPEER,0);

        curl_setopt_array($curl, array(
          CURLOPT_URL => 'https://springpesa.com/developer/api/mobilemoney/?query=mtnmoney',
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => '',
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 3000,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => 'POST',
          CURLOPT_POSTFIELDS =>$mpeke,
          CURLOPT_HTTPHEADER => array(
            'Content-Type: application/x-www-form-urlencoded'
          ), 
        ));

        $response = curl_exec($curl);
        $displ=json_decode($response);
        // dd($displ->message);
        $error=curl_error($curl);
        if ($error) {
            // code...
            dd($error);
        } else {
            // code...
            curl_close($curl);    
            //gettting the latest inserted order by the client       

             $laste= Order::where('user_id', Auth::user()->id)->latest()->get()->first();
            // dd($laste['id']);
             //response from the api to json format
             $resp=json_decode($response);

             //updating the Order table after succesfully data sent to api dashboard
            $product_order = Order::find($laste['id']);
               $product_order->payment_method = 'mtnmoney';
                $product_order->transref = $resp->transref;
                $product_order->status ='processing';
                $product_order->phone_number=$request->phone_number;
                $product_order->save();
             // dd($response);
                \Cart::clear();
                $products = Produce::all();
             return view('admin.success',compact('response'))->with('success', true)->with(['products' => $products])->with('alert', 'A payment notification was sent to,'.''.$resp->message.''.' your number,please enter pin to authorize payment!')->with('displ');
            
        }
          


        }elseif($num=='039') {
             $curl = curl_init();
        // Set API access key
        $api_key="4bc0399d01e32551328f12eb9cb137c1de6006365f970a38c64a4b4fcf412881";
         
           //form data
        $data=[
            'access_key'=>'4bc0399d01e32551328f12eb9cb137c1de6006365f970a38c64a4b4fcf412881',
            'phone'=>$request->phone_number,
            'amount'=>$request->amount
        ];
        //variable name to handle data to api
        $mpeke='action=initiate&apikey=4bc0399d01e32551328f12eb9cb137c1de6006365f970a38c64a4b4fcf412881&phone='.''.$request->phone_number.''.'&amount='.''.$request->amount;
         curl_setopt($curl,CURLOPT_SSL_VERIFYHOST,0);
          curl_setopt($curl,CURLOPT_SSL_VERIFYPEER,0);

        curl_setopt_array($curl, array(
          CURLOPT_URL => 'https://springpesa.com/developer/api/mobilemoney/?query=mtnmoney',
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => '',
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 3000,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => 'POST',
          CURLOPT_POSTFIELDS =>$mpeke,
          CURLOPT_HTTPHEADER => array(
            'Content-Type: application/x-www-form-urlencoded'
          ),
        ));

        $response = curl_exec($curl);
        $displ=json_decode($response);
        // dd($displ->message);
        $error=curl_error($curl);
        if ($error) {
            // code...
            dd($error);
        } else {
            // code...
            curl_close($curl);    
            //gettting the latest inserted order by the client       

             $laste= Order::where('user_id', Auth::user()->id)->latest()->get()->first();
            // dd($laste['id']);
             //response from the api to json format
             $resp=json_decode($response);

             //updating the Order table after succesfully data sent to api dashboard
            $product_order = Order::find($laste['id']);
               $product_order->payment_method = 'mtnmoney';
                $product_order->transref = $resp->transref;
                $product_order->status ='processing';
                $product_order->phone_number=$request->phone_number;
                $product_order->save();
             // dd($response);
                \Cart::clear();
                $products = Produce::all();
             return view('admin.success',compact('response'))->with('success', true)->with(['products' => $products])->with('alert', 'A payment notification was sent to,'.''.$resp->message.''.' your number,please enter pin to authorize payment!')->with('displ');
            
        }
          



        }elseif($num=='078') {

        $curl = curl_init();
        // Set API access key
        $api_key="4bc0399d01e32551328f12eb9cb137c1de6006365f970a38c64a4b4fcf412881";
         
           //form data
        $data=[
            'access_key'=>'4bc0399d01e32551328f12eb9cb137c1de6006365f970a38c64a4b4fcf412881',
            'phone'=>$request->phone_number,
            'amount'=>$request->amount
        ];
        //variable name to handle data to api
        $mpeke='action=initiate&apikey=4bc0399d01e32551328f12eb9cb137c1de6006365f970a38c64a4b4fcf412881&phone='.''.$request->phone_number.''.'&amount='.''.$request->amount;
         curl_setopt($curl,CURLOPT_SSL_VERIFYHOST,0);
          curl_setopt($curl,CURLOPT_SSL_VERIFYPEER,0);

        curl_setopt_array($curl, array(
          CURLOPT_URL => 'https://springpesa.com/developer/api/mobilemoney/?query=mtnmoney',
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => '',
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 3000,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => 'POST',
          CURLOPT_POSTFIELDS =>$mpeke,
          CURLOPT_HTTPHEADER => array(
            'Content-Type: application/x-www-form-urlencoded'
          ),
        ));

        $response = curl_exec($curl);
        $displ=json_decode($response);
        // dd($displ->message);
        $error=curl_error($curl);
        if ($error) {
            // code...
            dd($error);
        } else {
            // code...
            curl_close($curl);    
            //gettting the latest inserted order by the client       

             $laste= Order::where('user_id', Auth::user()->id)->latest()->get()->first();
            // dd($laste['id']);
             //response from the api to json format
             $resp=json_decode($response);

             //updating the Order table after succesfully data sent to api dashboard
            $product_order = Order::find($laste['id']);
               $product_order->payment_method = 'mtnmoney';
                $product_order->transref = $resp->transref;
                $product_order->status ='processing';
                $product_order->phone_number=$request->phone_number;
                $product_order->save();
             // dd($response);
                \Cart::clear();
                $products = Produce::all();
             return view('admin.success',compact('response'))->with('success', true)->with(['products' => $products])->with('alert', 'A payment notification was sent to,'.''.$resp->message.''.' your number,please enter pin to authorize payment!')->with('displ');
            
        }         

        }elseif($num=="070") //airtel phones
        {
        $curl = curl_init();
        // Set API access key
        $api_key="4bc0399d01e32551328f12eb9cb137c1de6006365f970a38c64a4b4fcf412881";
         
           //form data
        $data=[
            'access_key'=>'4bc0399d01e32551328f12eb9cb137c1de6006365f970a38c64a4b4fcf412881',
            'phone'=>$request->phone_number,
            'amount'=>$request->amount
        ];
        //variable name to handle data to api
        $mpeke='action=initiate&apikey=4bc0399d01e32551328f12eb9cb137c1de6006365f970a38c64a4b4fcf412881&phone='.''.$request->phone_number.''.'&amount='.''.$request->amount;
         curl_setopt($curl,CURLOPT_SSL_VERIFYHOST,0);
          curl_setopt($curl,CURLOPT_SSL_VERIFYPEER,0);

        curl_setopt_array($curl, array(
          CURLOPT_URL => 'https://springpesa.com/developer/api/mobilemoney/?query=airtelmoney',
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => '',
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 3000,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => 'POST',
          CURLOPT_POSTFIELDS =>$mpeke,
          CURLOPT_HTTPHEADER => array(
            'Content-Type: application/x-www-form-urlencoded'
          ),
        ));

        $response = curl_exec($curl);
        $displ=json_decode($response);
        // dd($displ->message);
        $error=curl_error($curl);
        if ($error) {
            // code...
            dd($error);
        } else {
            // code...
            curl_close($curl);    
            //gettting the latest inserted order by the client       

             $laste= Order::where('user_id', Auth::user()->id)->latest()->get()->first();
            // dd($laste['id']);
             //response from the api to json format
             $resp=json_decode($response);

             //updating the Order table after succesfully data sent to api dashboard
            $product_order = Order::find($laste['id']);
               $product_order->payment_method = 'airtelmoney';
                $product_order->transref = $resp->transref;
                $product_order->status ='processing';
                $product_order->phone_number=$request->phone_number;
                $product_order->save();
             // dd($response);
                \Cart::clear();


                $products = Produce::all();
             return view('admin.success',compact('response'))->with('success', true)->with(['products' => $products])->with('alert', 'A payment notification was sent to,'.''.$resp->message.''.' your number,please enter pin to authorize payment!')->with('displ');
            
        }
    
        } elseif($num=="075") {

        $curl = curl_init();
        // Set API access key
        $api_key="4bc0399d01e32551328f12eb9cb137c1de6006365f970a38c64a4b4fcf412881";
         
           //form data
        $data=[
            'access_key'=>'4bc0399d01e32551328f12eb9cb137c1de6006365f970a38c64a4b4fcf412881',
            'phone'=>$request->phone_number,
            'amount'=>$request->amount
        ];
        //variable name to handle data to api
        $mpeke='action=initiate&apikey=4bc0399d01e32551328f12eb9cb137c1de6006365f970a38c64a4b4fcf412881&phone='.''.$request->phone_number.''.'&amount='.''.$request->amount;
         curl_setopt($curl,CURLOPT_SSL_VERIFYHOST,0);
          curl_setopt($curl,CURLOPT_SSL_VERIFYPEER,0);

        curl_setopt_array($curl, array(
          CURLOPT_URL => 'https://springpesa.com/developer/api/mobilemoney/?query=airtelmoney',
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => '',
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 3000,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => 'POST',
          CURLOPT_POSTFIELDS =>$mpeke,
          CURLOPT_HTTPHEADER => array(
            'Content-Type: application/x-www-form-urlencoded'
          ),
        ));

        $response = curl_exec($curl);
        $displ=json_decode($response);
        // dd($displ->message);
        $error=curl_error($curl);
        if ($error) {
            // code...
            dd($error);
        } else {
            // code...
            curl_close($curl);    
            
            // dd($laste['id']);
             //response from the api to json format
             $resp=json_decode($response);

             //gettting the latest inserted order by the client
             $laste= Order::where('user_id', Auth::user()->id)->latest()->get()->first();
             //updating the Order table after succesfully data sent to api dashboard
            $product_order = Order::find($laste['id']);
               $product_order->payment_method = 'airtelmoney';
                $product_order->transref = $resp->transref;
                $product_order->status ='processing';
                $product_order->phone_number=$request->phone_number;
                $product_order->save();
             // dd($response);
                \Cart::clear();
                $products = Produce::all();
             return view('admin.success',compact('response'))->with('success', true)->with(['products' => $products])->with('alert', 'A payment notification was sent to,'.''.$resp->message.''.' your number,please enter pin to authorize payment!')->with('displ');
            
        }

        }else{
            // dd('not sipported');
            return redirect()->route('stkSimulation')->with('success', 'please check your phone number');
        }
        
        
    }

      public function TransTrans(){
        return view('admin.TransTrans');
    }

        public function SpringpesaCallBack(){

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
                 // dd($transref,$pp);
                 // code...
                $curl = curl_init();
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

            if ($response) {
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
                        return view('admin.TransTrans',compact('response'))->with('success', 'A payment notification was sent to,'.''.$resp->message.''.' your number,please enter pin to authorize payment!')->with('displ');

            }else{

                 $cartd=DB::table('carts')->where('user_id',Auth::user()->id)->count();
                return redirect()->route('admin.cart')->withTitle('E-COMMERCE STORE | SHOP')->with(['products' => $products])->with('success','Transaction failed please try again!')->withCartd($cartd);
                    }
                    }else{
                         $cartd=DB::table('carts')->where('user_id',Auth::user()->id)->count();
                return redirect()->route('admin.cart')->withTitle('E-COMMERCE STORE | SHOP')->with(['products' => $products])->withCartd($cartd)->with('success','Transaction failed please try again!');
                    }

         }else{

// dd($transref,$pp);
            $curl = curl_init();
             curl_setopt_array($curl, array(
              CURLOPT_URL => 'https://springpesa.com/developer/api/mobilemoney/?query=mtnmoney',
              CURLOPT_RETURNTRANSFER => true,
              CURLOPT_ENCODING => '',
              CURLOPT_MAXREDIRS => 10,
              CURLOPT_TIMEOUT => 0,
              CURLOPT_FOLLOWLOCATION => true,
              CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
              CURLOPT_CUSTOMREQUEST => 'POST',
              CURLOPT_POSTFIELDS => 'apikey=4bc0399d01e32551328f12eb9cb137c1de6006365f970a38c64a4b4fcf412881&transref=82278aad-2e96-4673-a164-9304acd48d63&action=creditwallet',
              CURLOPT_HTTPHEADER => array(
                'Content-Type: application/x-www-form-urlencoded'
              ),
            ));

            $response = curl_exec($curl);         

            curl_close($curl);
              dd($response);
            
            
            // return redirect()->route('admin.cart',compact('response'))->with('alert', 'A payment notification was sent to your number,please enter pin to authorize payment!');

            if ($response) {
                // code...
                if (json_decode($response)->status == 'SUCCESS') {
                // dd($response,'sux');
                     $laste= Order::where('user_id', Auth::user()->id)->latest()->get()->first();
                      //updating the Order table after succesfully data sent to api dashboard
                        $product_order = Order::find($laste['id']);
                        $product_order->TransactionID = json_decode($response)->TxnId;
                        $product_order->TransTime = Carbon::now()->format('Y-m-d H:i:s');
                        $product_order->save();
                        $products = Produce::all();

                    return view('admin.TransTrans',compact('response'))->with('success', true)->with(['products' => $products])->with('alert', 'A payment notification was sent to,'.''.$resp->message.''.' your number,please enter pin to authorize payment!')->with('displ');

            }else{

                 $cartd=DB::table('carts')->where('user_id',Auth::user()->id)->count();
                 return redirect()->route('admin.cart')->withTitle('E-COMMERCE STORE | SHOP')->with(['products' => $products])->withCartd($cartd);
            }
            }else{
               $cartd=DB::table('carts')->where('user_id',Auth::user()->id)->count();
        return redirect()->route('admin.cart')->withTitle('E-COMMERCE STORE | SHOP')->withCartd($cartd)->with('success','Transaction not completed successfully');
            }

         }

    }


    public function index()
    {
        //
        
        $ware_house=DB::table('users')->where(['user_type'=>'ware_house'])->get();
        return view('admin.Ware_house.index',compact('ware_house'))->withCartd($cartd);
    }

    public function payments()
    {
        //
          // \Cart::clear();
        $cartCollection = \Cart::getContent();

        $cartd=DB::table('carts')->where('user_id',Auth::user()->id)->count();
        $order=DB::table('orders')->where('user_id',Auth::user()->id)->get();
        return view('admin.payment',compact('order'))->with('Order made successfully,please make payment' ,'success',false, false)->with(['cartCollection' => $cartCollection])->withCartd($cartd);
        
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

    public function initialize_payment(Request $request)
    {
        //
        dd($request->all());
        $reference=Flutterwave::generateReference();
        //paymeny details
        
        $data=[
            'payment_option'=>'card,banktransfer,mm',
            'amount'=>$request->Amount,
            'email'=>$request->email,
            'tx_ref'=>$reference,
            'currency'=>"Ugx",
            'redirect_url'=>route('callback'),
            'client'=>[
                'email'=>$request->email,
                'contact'=>$request->tagline,
                'name'=>$request->fname,
            ],
            "customizations" => [
                "title" => 'mpekeXchange',
                "description" => "payments"
            ]
        ];
        dd($data);
        $payment=Flutterwave::initializePayment($data);
        if ($payment['status'] !=='success') {
            // code...
            return;
        }
        return redirect($payment['data']['link']);
    }

    public function callback(Request $request)
    {
        //
        $status=request()->status;
        if ($status=='successful') {
            // code...
            $TransactionID=Flutterwave::getTransactionIDFromCallback();
            $data=Flutterwave::verifyTransaction($TransactionID);
            dd($data);
        }
        elseif($status=='cancelled'){
            //transaction cancelled

        }
        else{
            //transaction failled
        }
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
        return view(admin.Buyer.edit);
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
