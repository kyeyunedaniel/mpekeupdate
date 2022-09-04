<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use DB;
use Auth;
use App\Models\Models\contracts;
use App\Models\Reject_reason;

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
        $contracts=DB::table('contracts')->where('user_id',Auth::user()->id)->get();
        
        return view('farmer.contracts.index',compact('contracts'));
    }

    public function rejectstore_review()
    {
        //
        $contracts=DB::table('contracts')->where(['status'=>0])->get();
         $farmer=DB::table('users')->where('user_type','farmer')->get();
        
        return view('admin.contract.View_rejected',compact('contracts','farmer'));
    }
    public function Aproved_review()
    {
        //
        $contracts=DB::table('contracts')->where(['status'=>2])->get();
         $farmer=DB::table('users')->where('user_type','farmer')->get();
        
        return view('admin.contract.aproved-contracts',compact('contracts','farmer'));
    }


    public function index_admin()
    {
        //
        $contracts=DB::table('contracts')->where(['status' =>3])->get();
        // dd($contracts);
         $farmer=DB::table('users')->where('user_type','farmer')->get();
         $userd=DB::table('users')->get();
        
        return view('admin.contract.index',compact('contracts','farmer','userd'));
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
        return view('admin.contract.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
        public function store_reason(Request $request)
    {
          
        Reject_reason::create([
            'name' => $request->name,
            'description' =>$request->action,
        ]);
        return back()->with('Account created successfully','success',false, false);
    }
    public function store(Request $request)
    {
        //
       //   $file = $request->file('doc');
   
       // if($request->has('doc')){
       //      $contracts_doc = request()->file('doc');
       //      $imageName = Auth::user()->id.'.'.time().'.'.$contracts_doc->getClientOriginalExtension();
       //  }
   
      //Move Uploaded File
      // $destinationPath = 'contracts_doc';
      // $contracts_doc->move(public_path('contracts_doc'), $imageName);        
        
        contracts::create([
           'name' => $request->name,
           'status'=>'2',
            'price' =>$request->price,
            'quantity' =>$request->qty,
            'Land_size' => $request->LandSize,
            'MaizeType' =>$request->Quality,
            'location' =>$request->Location,
            'user_id' =>Auth::user()->id,
            'warehouse_id'=>$request->categories_id,
            'date_available' => $request->date_available,
            'maize_status' => $request->maize_status,
        ]);
        return back()->with('Contract created successfully','success',false, false);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function reject(Request $request)
    {
        //
        // dd($request->all());
        $reject = contracts::findOrFail($request->contract_id);
        
        return view('admin.contract.Reject', compact('reject'));
    }

    public function rejectstore(Request $request)
    {
        
        // dd($request->all());
         $contr = contracts::find($request->id);

        $contr->status = '0'; 
        $contr->reason = $request->reject;
        $contr->save();
       return redirect()->route('contracts.admin.index')->with('Contracts updated successfully' ,'success');
    }

    public function Approve_farmer_request(Request $request) {
        // dd($request->contract_id);
        $ContractHistory = contracts::findOrFail($request->contract_id);
    
        $ContractHistory->status =2;
        $ContractHistory->save();
        return redirect('/admin/contracts');//->with('success','Request approved successfully')
    
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
        
        return view('admin.contract.edit', compact('product','userd'));
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
