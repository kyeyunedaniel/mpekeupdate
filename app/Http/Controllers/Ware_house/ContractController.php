<?php

namespace App\Http\Controllers\Ware_house;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use DB;
use Auth;
use App\Models\Models\contracts;

class ContractController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $warehouses=DB::table('warehouses')->where(['user_id' =>Auth::user()->id])->get();
        foreach ($warehouses as $key => $value) {
            // code...
            $ware=$value->name;
        }
        // dd($ware,Auth::user()->id);
         
        $contracts=DB::table('contracts')->where(['status' =>1])->get();
        // dd($contracts);
        
        return view('ware_house.contracts.index',compact('contracts','warehouses'));
    }
    public function Accepted_controcts(){
        //
        // $contracts=DB::table('contracts')->get();
        $contracts=DB::table('contracts')->where(['status' =>3])->get();
        // dd($contracts);
         $farmer=DB::table('users')->where('user_type','farmer')->get();
        
        return view('ware_house.contracts.Accepted-controcts',compact('contracts','farmer'));
    }
      public function Rejected_contracts(){
        //
        $contracts=DB::table('contracts')->where(['status' =>4])->get();
        // dd($contracts);
         $farmer=DB::table('users')->where('user_type','farmer')->get();
        
        return view('ware_house.contracts.Rejected-contracts',compact('contracts','farmer'));
    }

    public function approve(Request $request)
    {
        // dd($request->all());
        $user = contracts::findOrFail($request->contract_id);
        $user->status = '3';
        $user->save();

        return redirect('/ware_house/contracts')->with('success','Request approved successfully');
    }

     public function Rejected_contract()
    {
        //
        $contracts=DB::table('contracts')->where(['status'=>'4'])->get();
        // dd( $contracts);
        
        return view('ware_house.contracts.Rejected-contracts',compact('contracts'));
    }

    public function ware_house_rejected_contract(Request $request,$id)
    {
        //
        // dd($id);
        $reject = contracts::findOrFail($id);
        
        return view('ware_house.contracts.Reject', compact('reject'));
    }

        public function ware_house_rejected_contracted(Request $request,$id)
    {
        //
        // dd($id);
        $product = contracts::findOrFail($id);
        
        return view('ware_house.contracts.Rejected', compact('product'));
    }

    public function rejectstore(Request $request)
    {
        
        // dd($request->all());
         $contr = contracts::find($request->id);

        $contr->status = '4';
        $contr->reject_warehouse_reason = $request->reject;
        //  $Contract_Data_notify =
        //   [
        //     'name' => "Hello Mr/Miss",
        //     'body' => 'Contract reject that was requested',
        //     'statement' => 'This email is to inform you about the rejected metric request',
        //     'offerText' => $request->get('metric_name'),
            
        //   ];
        $contr->save();
       return redirect()->route('contracts.contracts.ware_house')->with('Contracts rejected successfully' ,'success');
    }

    public function index_admin()
    {
        //
        $contracts=DB::table('contracts')->where('user_id',Auth::user()->id)->get();
        
        return view('admin.contracts.index',compact('contracts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categories =DB::table('warehouses')->get();
        return view('farmer.contracts.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function status(Request $request)
    {
        
    $contr = contracts::find($request->contract_id);

        $contr->name = $request->name;
        $contr->price = $request->price;
        $contr->quantity = $request->quantity;
        $contr->quality = $request->Quality;
        $contr->date_available = $request->date_available;
        $contr->save();
        return back()->with('Account created successfully','success',false, false);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
        $contracts=DB::table('contracts')->where('user_id',Auth::user()->id)->get();
        $contract_histories=DB::table('contract_histories')->get();
        
        return view('farmer.contracts.Requests_made',compact('contracts','contract_histories'));
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
            $product = contracts::findOrFail($id);
            $userd=DB::table('users')->get();
        
        return view('ware_house.contracts.edit', compact('product','userd'));
    }

    public function edit_accepted($id)
    {
        //
            $product = contracts::findOrFail($id);
        
        return view('ware_house.contracts.edit-accept', compact('product'));
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
        // dd($request->all());

        $contr = contracts::find($request->contract_id);

        $contr->name = $request->name;
        $contr->price = $request->price;
        $contr->quantity = $request->quantity;
        $contr->quality = $request->Quality;
        $contr->date_available = $request->date_available;
        $contr->save();
       return redirect()->route('contracts.contracts.index')->with('Contracts updated successfully' ,'success');
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
