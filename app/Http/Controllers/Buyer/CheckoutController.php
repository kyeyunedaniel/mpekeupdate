<?php

namespace App\Http\Controllers\Buyer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Contracts\OrderContract;
use DB;
use Auth;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $orderRepository;

    public function __construct(OrderContract $orderRepository)
    {
      
        $this->orderRepository = $orderRepository;
    }

    public function getCheckout()
    {
          $cartd=DB::table('carts')->where('user_id',Auth::user()->id)->count();
        return view('buyer.checkout')->withCartd($cartd);
    }

    public function placeOrder(Request $request)
    {
        // Before storing the order we should implement the
        // request validation which I leave it to you
        $orders = $this->orderRepository->storeOrderDetails($request->all());
        $order=DB::table('orders')->where('user_id',Auth::user()->id)->get();

        $cartd=DB::table('carts')->where('user_id',Auth::user()->id)->count();
        return redirect()->route('admin.pays')->with('Order made successfully,please make payment' ,'success',false, false)->withCartd($cartd);
        

        // dd($order);
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
