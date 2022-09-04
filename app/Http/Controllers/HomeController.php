<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
     public function suggested_metrics()
    {
        # code...
         $comp = DB::table('suggestions')->where(['status' => 1])->get();
         // dd($comp);

        return view('Suggested_metrics', compact('comp'));
    }

    public function __invoke(Request $request)
    {
        return view('stockpredictor.index');
    }

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function buyer()
    {
        return view('home');
    }

    public function index()
    {
        return view('Buyer_index');
    }
    public function farmer()
    {
        return view('Farmer_index');
    }
    public function ware_house()
    {
        return view('ware_house_index');
    }
}
