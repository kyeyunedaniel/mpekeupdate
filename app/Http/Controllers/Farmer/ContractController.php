<?php

namespace App\Http\Controllers\Farmer;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use DB;
use Auth;
use App\Models\Models\contracts;
use App\Models\NagotiatePrice;
use App\Models\Models\ContractHistory;
use App\Models\Nagotiation;


class ContractController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function contracts_doc_file(Request $request){
        $contra = new \PhpOffice\PhpWord\PhpWord();
        $contracts=DB::table('contracts')->where('user_id',Auth::user()->id)->get();
        $contract_histories=DB::table('contract_histories')->get();
    }
    public function index()
    {
        //->where(['status'=>'1'])
        $contracts=DB::table('contracts')->where('user_id',Auth::user()->id)->get();
        $ware=DB::table('warehouses')->get();
        $contract_histories=DB::table('contract_histories')->get();

        $seller_id=DB::table('nagotiations')->where('seller_id', '=' , Auth::user()->id)->latest()->first();
        // dd($seller_id,Auth::user()->id);
        return view('farmer.contracts.index',compact('contracts','ware','contract_histories','seller_id'));
    } 

    public function Approve_buyer_request($id) {
        // dd($id);
    $ContractHistory = ContractHistory::findOrFail($id);
        $ContractHistory->Request_status = 1;
        $Word_contract = new \PhpOffice\PhpWord\PhpWord();
        $section = $Word_contract->addSection();
        $section->addImage("./frontend/images/icons/pay-bank.png");
        $text = $section->addText('Name:'.'.'. $ContractHistory->contract_id);
        $text = $section->addText('Quality:'.'.'.$ContractHistory->quality);
        $text = $section->addText('Quantity:'.'.'.$ContractHistory->quantity);
        $text = $section->addText('Delivery Date:'.'.'.$ContractHistory->delivery_date);
        $text = $section->addText('Product preparedness status:'.'.'.$ContractHistory->maize_status);
        $text = $section->addText('price:'.'.'.$ContractHistory->price,array('name'=>'Arial','size' => 20,'bold' => true));
        $text=$section->addText('
            BY SIGNING BELOW, THE CUSTOMER ACKNOWLEDGES HAVING READ AND UNDERSTOOD THIS CONTRACT AND THAT THE CUSTOMER IS SATISFIED WITH THE TERMS AND CONDITIONS CONTAINED IN THIS CONTRACT. THE CUSTOMER SHOULD NOT SIGN THIS CONTRACT IF THERE ARE ANY BLANK SPACES. THE CUSTOMER IS ENTITLED TO A COPY OF THIS CONTRACT AT THE TIME OF SIGNATURE.
            ');
         // $section->addText($description);  
        $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($Word_contract, 'Word2007');
        try {
            // dd($objWriter);
           $doc=$objWriter->save(public_path('contracts_doc'), $ContractHistory->contract_id.'.'.$ContractHistory->delivery_date.''.'.docx');
            // $objWriter->save(storage_path($ContractHistory->contract_id.'.'.$ContractHistory->delivery_date.'.'.'.docx'));
            $ContractHistory->Word_contract ='contracts/'.$ContractHistory->contract_id.'.'.$ContractHistory->delivery_date.'.'.'.docx';
            $ContractHistory->save();
             return redirect('/farmer/received-contracts-requests');
            // return back();
        } catch (Exception $e) {
        }

       //->with('success','Request approved successfully')
    
    }

     public function Rejected_contracts()
    {
        // 
        $contracts=DB::table('contracts')->where(['status'=>'0'])->get();
        // dd( $contracts);
        
        return view('farmer.contracts.Rejected-contracts',compact('contracts'));
    }
     public function Rejected_request()
    {
        // 
        $contracts=DB::table('contracts')->where(['status'=>'4'])->get();
        // dd( $contracts);
        
        return view('farmer.contracts.Rejected-requests',compact('contracts'));
    }

    public function index_admin()
    {
        //
        $contracts=DB::table('contracts')->where('user_id',Auth::user()->id)->get();
        $ware=DB::table('warehouses')->get();
        return view('admin.contracts.index',compact('contracts','ware'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categories =DB::table('warehouses')->where(['status'=>'1'])->get();
        return view('farmer.contracts.create',compact('categories'));
    }
    public function price(Request $request)
    {
        // dd($request->all(),Auth::user()->id,Nagotiation::where(['contract_id' => $request->id])->latest()->first());
        // $request->validate([
        //     'reason'=>  'required'
        // ]);
        
        // NagotiatePrice::create([
        //     'product_id' => $request->id,
        //     'price' =>$request->price,
        //     'user_id' =>Auth::user()->id,
        //     'reason'=>$request->reason
        // ]);

        if(auth()->user()->user_type=='farmer')
        {
            
            $courseh = Nagotiation::where(['contract_id' => $request->id])->latest()->first();
            if ($request->reason=='Accepted') {
                # code...
                $contracts = contracts::find($request->id);
            $ContractHistory = ContractHistory::where(['contract_id' => $request->id])->latest()->first();
                $Word_contract = new \PhpOffice\PhpWord\PhpWord();
                $section = $Word_contract->addSection();
                $section->addImage("./frontend/images/icons/pay-bank.png");
                $text = $section->addText('Receipt N0:'.'.'. "MpekeXchange" .'/'.rand(2,'9999'));
                $text = $section->addText('Contract N0:'.'.'.$ContractHistory->contract_id);
                $text=$section->addText('Maize Type:'.'.'.$contracts->MaizeType);
                $text=$section->addText('Grain Status:'.'.'.$contracts->maize_status);
                $text = $section->addText('Quantity:'.'.'.$ContractHistory->quantity);
                $text = $section->addText('Delivery Date:'.'.'.$ContractHistory->delivery_date);
                $text = $section->addText('Product preparedness status:'.'.'.$ContractHistory->maize_status);
                $text = $section->addText('Accepted price By Seller:'.'.'.$request->price,array('name'=>'Arial','size' => 20,'bold' => true));
                $text=$section->addText('
                    BY SIGNING BELOW, THE CUSTOMER ACKNOWLEDGES HAVING READ AND UNDERSTOOD THIS CONTRACT AND THAT THE CUSTOMER IS SATISFIED WITH THE TERMS AND CONDITIONS CONTAINED IN THIS CONTRACT. THE CUSTOMER SHOULD NOT SIGN THIS CONTRACT IF THERE ARE ANY BLANK SPACES. THE CUSTOMER IS ENTITLED TO A COPY OF THIS CONTRACT AT THE TIME OF SIGNATURE.
                    ');
                // $section->addText($description);  
                $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($Word_contract, 'Word2007');
                try {
                    // dd($objWriter);
                $doc=$objWriter->save(public_path('contracts_doc'), $ContractHistory->contract_id.'.'.$ContractHistory->delivery_date.''.'.docx');
                    // $objWriter->save(storage_path($ContractHistory->contract_id.'.'.$ContractHistory->delivery_date.'.'.'.docx'));
                    $ContractHistory->Word_contract ='contracts/'.$ContractHistory->contract_id.'.'.$ContractHistory->delivery_date.'.'.'.docx';
                    $ContractHistory->save();
                    } catch (Exception $e) {
        }
            }
                        
            Nagotiation::create([
            'contract_id' => $request->id,
            'farmer_price' =>$request->price,
            'seller_id' =>Auth::user()->id,
            'farmer_reason'=>$request->reason,
            'buyer_id' =>$courseh->buyer_id,
            'nagotiator'=>'sell',
            'buyer_price'=>$courseh->buyer_price,
            'buyer_reason'=>$courseh->buyer_reason,
        ]);
        return back()->with('success','New price set successfully');
        }else{
         $courseh = Nagotiation::where(['contract_id' => $request->id])->latest()->first();
            // dd($courseh,$request->all());  
            if ($request->reason=='Accepted') {
                # code...
                $contracts = contracts::find($request->id);
            $ContractHistory = ContractHistory::where(['contract_id' => $request->id])->latest()->first();
                $Word_contract = new \PhpOffice\PhpWord\PhpWord();
                $section = $Word_contract->addSection();
                $section->addImage("./frontend/images/icons/pay-bank.png");
                $text = $section->addText('Receipt N0:'.'.'. "MpekeXchange" .'/'.rand(2,'9999'));
                $text = $section->addText('Contract N0:'.'.'.$ContractHistory->contract_id);
                $text=$section->addText('Maize Type:'.'.'.$contracts->MaizeType);
                $text=$section->addText('Grain Status:'.'.'.$contracts->maize_status);
                $text = $section->addText('Quantity:'.'.'.$ContractHistory->quantity);
                $text = $section->addText('Delivery Date:'.'.'.$ContractHistory->delivery_date);
                $text = $section->addText('Product preparedness status:'.'.'.$ContractHistory->maize_status);
                $text = $section->addText('Accepted price By Buyer:'.'.'.$request->price,array('name'=>'Arial','size' => 20,'bold' => true));
                $text=$section->addText('
                    BY SIGNING BELOW, THE CUSTOMER ACKNOWLEDGES HAVING READ AND UNDERSTOOD THIS CONTRACT AND THAT THE CUSTOMER IS SATISFIED WITH THE TERMS AND CONDITIONS CONTAINED IN THIS CONTRACT. THE CUSTOMER SHOULD NOT SIGN THIS CONTRACT IF THERE ARE ANY BLANK SPACES. THE CUSTOMER IS ENTITLED TO A COPY OF THIS CONTRACT AT THE TIME OF SIGNATURE.
                    ');
                // $section->addText($description);  
                $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($Word_contract, 'Word2007');
                try {
                    // dd($objWriter);
                $doc=$objWriter->save(public_path('contracts_doc'), $ContractHistory->contract_id.'.'.$ContractHistory->delivery_date.''.'.docx');
                    // $objWriter->save(storage_path($ContractHistory->contract_id.'.'.$ContractHistory->delivery_date.'.'.'.docx'));
                    $ContractHistory->Word_contract ='contracts/'.$ContractHistory->contract_id.'.'.$ContractHistory->delivery_date.'.'.'.docx';
                    $ContractHistory->save();
                    } catch (Exception $e) {
        }
            }
               

         Nagotiation::create([
            'contract_id' => $request->id,
            'buyer_price' =>$request->price,
            'buyer_id' =>Auth::user()->id,
            'nagotiator'=>'buy',
            'buyer_reason'=>$request->reason,
            'farmer_price' =>$courseh->farmer_price,
            'seller_id' =>$courseh->seller_id,
            'farmer_reason'=>$courseh->farmer_reason
        ]);
        return back()->with('success','New price set successfully');
    

    }
        
        
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
        // dd($request->all(),Auth::user()->id);

      //   $file = $request->file('doc');
   
      //  if($request->has('doc')){
      //       $contracts_doc = request()->file('doc');
      //       $imageName = Auth::user()->id.'.'.time().'.'.$contracts_doc->getClientOriginalExtension();
      //   }
   
      // //Move Uploaded File
      // $destinationPath = 'contracts_doc';
      // $contracts_doc->move(public_path('contracts_doc'), $imageName);
            // 'doc'=>'contracts_doc/'.$imageName,        
        // dd($request->all());
        contracts::create([
            'name' => $request->name,
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
        

        
        return back()->with('success','Contract has succussfully been saved');
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
        $users=DB::table('users')->where(['user_type'=>'buyer'])->get();
        $Logged_in_farmer=DB::table('nagotiate_prices')->where('user_id', '=' , Auth::user()->id)->get();

        $contracts=DB::table('contracts')->where('user_id',Auth::user()->id)->get();
        $contract_histories=DB::table('contract_histories')->get();
        
        $prod=DB::table('nagotiate_prices')->where('user_id', '=' , Auth::user()->id)->latest()->first();
        $farm=DB::table('nagotiate_prices')->where('user_id', '!=' , Auth::user()->id)->latest()->first();
        // dd(auth()->user()->id,$contracts);
        $prodd=DB::table('nagotiate_prices')->where('user_id',Auth::user()->id)->take(-2)->get();

       $nagotiating_buyers=DB::table('contracts')->get();
       $nagotiate_prices=DB::table('nagotiate_prices')->where('user_id', '!=' , Auth::user()->id)->get();
        // dd($farmers) ->where('user_id', '=' ,$value->id);
        $seller_id=DB::table('nagotiations')->where('seller_id', '=' , Auth::user()->id)->latest()->first();
        
        return view('farmer.contracts.Requests_made',compact('contracts','users','nagotiate_prices','seller_id','nagotiating_buyers','contract_histories','prod','farm'));
    }

    public function approval_contra(){

        $contracts=DB::table('contracts')->where('user_id',Auth::user()->id)->get();
        $users=DB::table('users')->get();
        return view('farmer.contracts.Accepted-controcts',compact('contracts','users'));
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
        // dd($id);
            $product = contracts::findOrFail($id);
        
        return view('farmer.contracts.edit', compact('product'));
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
        $contr->Land_size = $request->LandSize;
        $contr->price = $request->price;
        $contr->quantity = $request->quantity;
        $contr->MaizeType = $request->Quality;
        $contr->date_available = $request->date_available;
        $contr->save();
       return redirect()->route('contracts.contracts.index')->with('success','Contracts updated successfully');
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
