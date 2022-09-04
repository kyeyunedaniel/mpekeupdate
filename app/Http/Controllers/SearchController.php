<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Warehouse;
use DataTables;
class SearchController extends Controller

{
	public function index(Request $request)
	{
		$request->validate([
            'search'=>'required'
        ]);
        $sear=$request->input('search');
        // dd($sear);

        $search = $request->input('search');
        $posts = Warehouse::query()
        ->where('name', 'like', "%{$sear}%")
        ->orWhere('district', 'like', "%{$sear}%")
        // ->paginate(6);
        dd($posts);
		return view('full-text-search');
	}   
	Public function search(Request $request)
	{
		if($request->ajax())
		{
			$data = Warehouse::search($request->get('full_text_search_query'))->get();
			return response()->json($data);
		}
	} 
}