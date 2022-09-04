<?php

namespace App\Http\Controllers;

use App\Models\SuperUser;
use App\Models\User;
use App\Models\Course;
use App\Models\Student;
use App\Models\Announcement;
use Illuminate\Http\Request;
use App\Models\Course_unit;
use DB;
use Auth;
class SuperUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function created()
    {
        $prod = Student::all();
        return view('product', compact('prod'));
        // dd($prod);
    }

    public function findProductName(Request $request){

		
	    //if our chosen id and products table prod_cat_id col match the get first 100 data 

        //$request->id here is the id of our chosen option id
        $data=Course_unit::select('course_name','id')->where('course_code',$request->id)->take(100)->get();
        return response()->json($data);//then sent this data to ajax success
	}


	public function findPrice(Request $request){
	//  echo "hello";
		//it will get price if its id match with Course_unit id
         $p =DB::table('warehouses')->where('district',$request->id)->where(['status'=>'1'])->get();
        // $p=Student::where('studentID',$request->id)->first();
		// $p=Course_unit::where('course_code',$request->id)->first();
		
    	return response()->json($p);
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
     * @param  \App\Models\SuperUser  $superUser
     * @return \Illuminate\Http\Response
     */
    public function show(SuperUser $superUser)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SuperUser  $superUser
     * @return \Illuminate\Http\Response
     */
    public function edit(SuperUser $superUser)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SuperUser  $superUser
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SuperUser $superUser)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SuperUser  $superUser
     * @return \Illuminate\Http\Response
     */
    public function destroy(SuperUser $superUser)
    {
        //
    }
    
    public function updates(Request $request)
    {
        
        $user = User::find(Auth::user()->id);
        
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->phone_1 = $request->input('phone_1');
        $user->phone_2 = $request->input('phone_2');
        $user->gender = $request->input('gender');
        $user->date_of_birth = $request->input('date_of_birth');
        $user->religion = $request->input('religion');
        $user->marital_status= $request->input('marital_status');
        $user->spouse_name = $request->input('spouse_name');
        $user->spouse_contact = $request->input('spouse_contact');
        $user->disability  = $request->input('disability');
        $user->nature_of_disability = $request->input('nature_of_disability');
        $user->father_name = $request->input('father_name');
        $user->father_contact = $request->input('father_contact');
        $user->mother_name = $request->input('mother_name');
        $user->mother_contact = $request->input('mother_contact');

        if($request->file('file')) {
            $old_image = public_path('images').'/'.$user->profileImage;
            if (file_exists($old_image) & $user->profileImage != 'default.jpg') {
                unlink($old_image);
            }
            $image = $request->file('file');
            $imageName = time().'.'.$image->extension();
            $image->move(public_path('images'),$imageName);
            $user->profileImage = $imageName;
        }

        $user->update();        

        return redirect()->back()->with('success', 'Profile updated successfully.');
    }

}
