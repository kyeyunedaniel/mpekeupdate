<?php

  

namespace App\Http\Controllers;  

use Illuminate\Http\Request;

use App\Models\Post;

  

class PostController extends Controller

{

    public function postCreate()

    {

        return view('post');

    }

  

    public function postData(Request $request)

    {
    	// if (Input::has('cat')) {
    	// 	foreach ($Input::get('cat') as $value) {

    	// 		# code...
    	// 	}
    	// 	# code...
    	// }

        $input = $request->all();
    $input['cat'] = json_encode($input['cat']);

    // dd(serialize($input));

   $emplo = new Post ([
            'name' => $request->get('name'),
            'description' => $request->get('description'),
            // 'password' => $request->get('password'),
            
            'cat' => serialize($input),
            // 'country' => $request->get('country')
        ]);
        dd($emplo);

      // $f= Post::create();
      // $f->serialize($input);
      // $f->$request('name');
      // $f->$request('description');
      // $f->save();

  

        dd('Post created successfully.');

    }

}