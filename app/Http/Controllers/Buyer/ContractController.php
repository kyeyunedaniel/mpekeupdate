<?php

namespace App\Http\Controllers\Buyer;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use DB;
use Auth;
use App\Models\Models\contracts;
use App\Models\Models\ContractHistory;
use PDF;
use App\Models\Nagotiation;
use Illuminate\Support\Facades\Storage;
use Response;

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
        $contracts=DB::table('contracts')->where(['status'=>2,'booked'=>1])->get(); 
        $status=DB::table('contract_histories')->where('user_id', '=' , Auth::user()->id)->latest()->first();
        // dd($status);
        $far=DB::table('contract_histories')->where('user_id', '!=' , Auth::user()->id)->latest()->first();
        // dd($far);
        $contract_histories=ContractHistory::all();
        foreach ($contract_histories as $key => $value) {
            // code...
            $id=$value->contract_id;
        }
        $buyer_id=DB::table('nagotiations')->where('buyer_id', '=' , Auth::user()->id)->latest()->first();
        
              
        
        return view('buyer.contract.index',compact('contracts','contract_histories','status','far','buyer_id'));
    }

    public function index_admin()
    {
        //
        $contracts=DB::table('contracts')->where('user_id',Auth::user()->id)->where('booked',0)->get();
        dd($contracts);
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
    public function store(Request $request)
    {
        //
        //  dd($request->all());
         $contr = contracts::find($request->contract_id);

        $contr->booked = '0';
        $contr->save(); 
        if ($request->price==$request->suggested) {
                # code...
                $contracts = contracts::find($request->contract_id);
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
                $text = $section->addText('Accepted price By Buyer:'.'.'.$request->suggested,array('name'=>'Arial','size' => 20,'bold' => true));
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
               

        ContractHistory::create([
            'contract_pdt_name'=> $request->name,
            'Requests_made'=> $request->name,
            'contract_id' => $request->contract_id,
            'price' =>$request->price,
            'quantity' =>$request->quantity,
            'quality' =>$request->Quality,
            'user_id' =>Auth::user()->id,
            'date_available'=>$request->date_available,
            'suggest_price'=>$request->suggested
        ]);
       return redirect()->route('contracts.contracts.Buy')->with('Contracts request sent successfully' ,'success');
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
        // dd(auth()->user()->id);
        $users=DB::table('users')->where(['user_type'=>'farmer'])->get();
        $contracts=DB::table('contract_histories')->where(['Request_status'=>0,'user_id'=>Auth::user()->id])->get();
        $contract_histories=DB::table('contract_histories')->where(['user_id'=>Auth::user()->id])->get();
        // dd($contract_histories,Auth::user()->id);
        // $prod=DB::table('nagotiate_prices')->latest()->first();
        foreach ($users as $key => $value) {
             $produsers=DB::table('contracts')->where('user_id', '=' ,$value->id)->get();
                foreach ($produsers as $key => $value) {
            $farmers= DB::table('nagotiate_prices')->where('user_id', '=' , $value->user_id)->get();
                }
        } 
        $n=DB::table('nagotiate_prices')->where('user_id', '=' , '4')->first();
    //   dd(DB::table('users')->where(['id'=>$n->user_id])->first());
        $prod=DB::table('nagotiate_prices')->where('user_id', '=' , Auth::user()->id)->latest()->first();
        $buyer_nago=DB::table('nagotiate_prices')->where('user_id', '=' , Auth::user()->id)->get();
        $farm=DB::table('nagotiate_prices')->where('user_id', '!=' , Auth::user()->id)->latest()->first();
        // dd($buyer_nago);
        $filename= public_path('IT_CV.pdf');
        $buyer_id=DB::table('nagotiations')->where('buyer_id', '=' , Auth::user()->id)->latest()->first();
         $all=DB::table('nagotiations')->get();
         $prousers=DB::table('contracts')->get();
         foreach ($prousers as $key => $value) {
         $fmr= DB::table('nagotiations')->where(['buyer_id'=>$value->user_id])->latest()->first();//,'contract_id'=>$value->id
         }
        //  dd($buyer_id->farmer_price,Auth::user()->id);
        // if ($buyer_id !==null) {
        //     dd($buyer_id);
        // }else
        //  {dd('$buyer_id');}
        
        return view('buyer.contract.Requests_made',compact('contracts','fmr','buyer_id','buyer_nago','produsers','filename','contract_histories','prod','all','farm'));
    }


    public function downloadFile()

    {

        $myFile = public_path("IT_CV.pdf");

        $headers = ['Content-Type: application/pdf'];

        $newName = 'Contract-'.time().'.pdf';


        return response()->download($myFile, $newName, $headers);

    }	


    public function downloadpdf(Request $request){


        $filename = 'IT_CV.pdf';  //Storage::download('storage/curriculum.pdf');
$path = storage_path();

return Response::make(file_get_contents($path), 200, [
    'Content-Type' => 'application/pdf',
    'Content-Disposition' => 'inline; filename="'.$filename.'"'
]);


          if(Storage::disk('public')->exists("pdf/$request->file")){
                    $path=Storage::disk('public')->path("pdf/$request->file");
                    $content=file_get_contents($path);


            return response($content)->withHeaders([
                'Content-Type'=>mime_content_type($path)
            ]);
            return redirect('/file not found');
    }
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
        
        return view('buyer.contract.edit', compact('product'));
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
