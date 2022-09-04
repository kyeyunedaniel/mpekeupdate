<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Contracts\OrderContract;
use DB;
use Auth;
use App\Models\Warehouse;
use App\Models\Processor;
use App\Models\Transporter;
use Illuminate\Support\Facades\Session;


class WelcomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
       
       public function Warehouse($id)
    {
        //
        $pro=DB::table('produces')->get();
        // $advert=DB::table('adverts')->where(['status'=>'1'])->get();
          $Warehouse = Warehouse::findOrFail($id);
          $countries=DB::table('countries')->get();
          $districts=DB::table('districts')->get();
          $ware_hous=DB::table('warehouses')->where(['status'=>'1'])->get();
          $contracts=DB::table('contracts')->where(['status'=>2,'booked'=>1])->get(); 
          $partners=DB::table('districts')->get();
          $Processors=DB::table('processors')->get();
            $advert=DB::table('transporters')->get();
            $users=DB::table('users')->get();
            return view('warehouse-details', compact('Warehouse','users','contracts','partners','Processors','ware_hous','countries','pro','advert','districts'));
    }

    public function transporter($id){
        $pro=DB::table('produces')->get();
        $users=DB::table('users')->get();
        // $advert=DB::table('adverts')->where(['status'=>'1'])->get();
          $Warehouse = Transporter::findOrFail($id);
          $countries=DB::table('countries')->get();
          $districts=DB::table('districts')->get();
          $ware_hous=DB::table('warehouses')->where(['status'=>'1'])->get();
          $contracts=DB::table('contracts')->where(['status'=>2,'booked'=>1])->get(); 
          $partners=DB::table('districts')->get();
          $Processors=DB::table('processors')->get();
          $advert=DB::table('transporters')->get();
            return view('transporters-details', compact('Warehouse','users','contracts','partners','Processors','ware_hous','countries','pro','advert','districts'));
    


    }

    public function processor($id){
         $pro=DB::table('produces')->get();
        // $advert=DB::table('adverts')->where(['status'=>'1'])->get(); 0200100100
          $Warehouse = Processor::findOrFail($id);
          $countries=DB::table('countries')->get();
          $districts=DB::table('districts')->get();
          $ware_hous=DB::table('warehouses')->where(['status'=>'1'])->get();
          $contracts=DB::table('contracts')->where(['status'=>2,'booked'=>1])->get(); 
          $partners=DB::table('districts')->get();
          $Processors=DB::table('processors')->get();
          $advert=DB::table('transporters')->get();
          $users=DB::table('users')->get();
            return view('1processors-details', compact('Warehouse','users','contracts','partners','Processors','ware_hous','countries','pro','advert','districts'));
    
        
    }

    public function index(Request $request)
    {
        //
         $sear = $request->input('search');
         Session::put('search',$request->input('search'));
        //  dd($sear);
         if ($sear) {
        //       $posts = Warehouse::query()
        // ->where('name', 'like', "%$sear%")
        // ->orWhere('district', 'like', "%{$sear}%")
        // ->get();

         $posts = Warehouse::query()
                ->where('name', 'like', "%$sear%")
                ->orWhere('district', 'like', "%{$sear}%")
                ->paginate(6);
                    $advert=DB::table('adverts')->where(['status'=>'1'])->get();
                  // dd($advert);

          $contracts=DB::table('contracts')->where(['status'=>2,'booked'=>1])->get(); 
                  $pro=DB::table('produces')->get();
                        $ware_hous=DB::table('warehouses')->where(['status'=>'1'])->get();
                        
                        $districts=DB::table('districts')->get();
        return view('search',compact('ware_hous','pro','advert','posts','districts','contracts'));
        
        // if($posts !='') {
        //     dd($posts);
        // }
        // else{
        //     dd('no');
        // //      $posts
        // }
        
         } else
         {

            $pro=DB::table('produces')->get();
            // $advert=DB::table('users')->where(['user_type'=>'transporter'])->get();
            $Processors=DB::table('processors')->get();
            $advert=DB::table('transporters')->get();
            $districts=DB::table('districts')->get();
                $ware_hous=DB::table('warehouses')->where(['status'=>'1'])->get();
                $partners=DB::table('districts')->get();
                // session::pu
                // dd($advert);
        $contracts=DB::table('contracts')->where(['status'=>2,'booked'=>1])->get(); 
                
                return view('product',compact('contracts','ware_hous','pro','advert','districts','Processors','partners'));
            }
    }
    public function indexSearch(Request $request)
    {
        //
         $sear = $request->input('search');
         Session::put('search',$request->input('search'));
        //  dd($sear);
         if ($sear) {
              $posts = Warehouse::query()
        ->where('name', 'like', "%$sear%")
        ->orWhere('district', 'like', "%{$sear}%")
        ->get();

         $posts = Warehouse::query()
                ->where('name', 'like', "%$sear%")
                ->orWhere('district', 'like', "%{$sear}%")
                ->paginate(6);
                    // $advert=DB::table('adverts')->where(['status'=>'1'])->get();
                  // dd($advert);
                  $pro=DB::table('produces')->get();
                        $ware_hous=DB::table('warehouses')->where(['status'=>'1'])->get();

        $contracts=DB::table('contracts')->where(['status'=>2,'booked'=>1])->get();
$Processors=DB::table('processors')->get();
            $advert=DB::table('transporters')->get();
                        
                        $districts=DB::table('districts')->get();
        return view('search',compact('ware_hous','pro','advert','posts','districts','contracts','Processors'));
        
        // if($posts !='') {
        //     dd($posts);
        // }
        // else{
        //     dd('no');
        // //      $posts
        // }
        
         } else
         {

            $pro=DB::table('produces')->get();
            // $advert=DB::table('users')->where(['user_type'=>'transporter'])->get();
            $Processors=DB::table('processors')->get();
            $advert=DB::table('transporters')->get();
            $districts=DB::table('districts')->get();
                $ware_hous=DB::table('warehouses')->where(['status'=>'1'])->get();
                $partners=DB::table('districts')->get();
                // session::pu
                // dd($advert);
        $contracts=DB::table('contracts')->where(['status'=>2,'booked'=>1])->get(); 
                
                return view('product',compact('contracts','ware_hous','pro','advert','districts','Processors','partners'));
            }
    }
    public function findPrice(Request $request){
	
		//it will get price if its id match with Course_unit id
        $p=Warehouse::where('district',$request->id)->get();
        // dd($p);
		
    	return response()->json($p);
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
