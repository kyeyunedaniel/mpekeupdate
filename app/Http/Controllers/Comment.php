<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Comment extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
       
           return view('sample');
    }

    public function drop()
    {
        //
       
           return view('dropdown');
    }

    public function postData(Request $request)

    {

        $input = $request->all();
        

        $input['cat'] = json_encode($input['cat']);

        $val = implode(",",$input['cat[]']);
        $val = explode(",",$input['cat[]']);
        $count = count($val);

        for($a=0; $a<$count; $a++){
           $data =      array("accountID" => $abc,
                  "deviceID"=> $request['deviceID'],
                  "cat"=>$val[$a],
                  "lastUpdateTime"=>time(),
                  "creationTime"=>time());
           dd($data);
         }


        dd($input);

      

        Post::create($input);

       

        dd('Post created successfully.');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
       $objDOM = new \DOMDocument();
        $objDOM->load("b.xml");

        $results_product = $objDOM->getElementsByTagName("product");
        for( $i=0; $i < $results_product->length; $i++)
                $product= $results_product->item($i)->nodeName;


                $results_resource = $objDOM->getElementsByTagName("resource");
        for( $i=0; $i < $results_resource->length; $i++)
                $resource= $results_resource->item($i)->nodeName;

                $results_business = $objDOM->getElementsByTagName("business");
        for( $i=0; $i < $results_business->length; $i++)
                $business= $results_business->item($i)->nodeName;

                      $results_team = $objDOM->getElementsByTagName("team");
        for( $i=0; $i < $results_team->length; $i++)
                $team= $results_team->item($i)->nodeName;

                $results_project = $objDOM->getElementsByTagName("project");
        for( $i=0; $i < $results_project->length; $i++)
                $project= $results_project->item($i)->nodeName;


            $rootTag_resource = $objDOM->getElementsByTagName("resource")->item(0);
            $rootTag_business = $objDOM->getElementsByTagName("business")->item(0);
            $rootTag_team = $objDOM->getElementsByTagName("team")->item(0);
             $rootTag_project = $objDOM->getElementsByTagName("project")->item(0);
              $rootTag_product = $objDOM->getElementsByTagName("product")->item(0);             
                
        if($_REQUEST['Type']==$business){
        $dataTags=$objDOM->createElement("Metric");            
        $nameTag=$objDOM->createElement("Metricname",$_REQUEST['name']);
        $emailTag=$objDOM->createElement("datasource",$_REQUEST['email']);
        $visualizationname_Tag=$objDOM->createElement("visualizationname",$_REQUEST['visualizationname']);
        $visualizationlink_Tag=$objDOM->createElement("visualizationlink",$_REQUEST['visualizationlink']);
        $description_Tag=$objDOM->createElement("description",$_REQUEST['description']);
                  
        $dataTags->appendChild($nameTag);
        $dataTags->appendChild($emailTag);
        $dataTags->appendChild($visualizationname_Tag);
        $dataTags->appendChild($visualizationlink_Tag);
        $dataTags->appendChild($description_Tag);
        $rootTag_business->appendChild($dataTags);
        $objDOM->save("b.xml");
        echo 'metric successfully added to metric business type';

        }
        elseif($_REQUEST['Type']==$product){
          $dataTags=$objDOM->createElement("Metric");            
          $nameTag=$objDOM->createElement("Metricname",$_REQUEST['name']);
          $emailTag=$objDOM->createElement("datasource",$_REQUEST['email']);
          $visualizationname_Tag=$objDOM->createElement("visualizationname",$_REQUEST['visualizationname']);
          $visualizationlink_Tag=$objDOM->createElement("visualizationlink",$_REQUEST['visualizationlink']);
          $description_Tag=$objDOM->createElement("description",$_REQUEST['description']);
              
          $dataTags->appendChild($nameTag);
          $dataTags->appendChild($emailTag);
          $dataTags->appendChild($visualizationname_Tag);
          $dataTags->appendChild($visualizationlink_Tag);
          $dataTags->appendChild($description_Tag);
          $rootTag_product->appendChild($dataTags);
          $objDOM->save("b.xml");
          echo 'metric successfully added to metric product type';
        }
        elseif($_REQUEST['Type']==$resource){
          $dataTags=$objDOM->createElement("Metric");            
          $nameTag=$objDOM->createElement("Metricname",$_REQUEST['name']);
          $emailTag=$objDOM->createElement("datasource",$_REQUEST['email']);
          $visualizationname_Tag=$objDOM->createElement("visualizationname",$_REQUEST['visualizationname']);
          $visualizationlink_Tag=$objDOM->createElement("visualizationlink",$_REQUEST['visualizationlink']);
          $description_Tag=$objDOM->createElement("description",$_REQUEST['description']);
              
          $dataTags->appendChild($nameTag);
          $dataTags->appendChild($emailTag);
          $dataTags->appendChild($visualizationname_Tag);
          $dataTags->appendChild($visualizationlink_Tag);
          $dataTags->appendChild($description_Tag);
          $rootTag_resource->appendChild($dataTags);
          $objDOM->save("b.xml");
          echo 'metric successfully added to metric resource type';
        }
        elseif($_REQUEST['Type']==$team){
          $dataTags=$objDOM->createElement("Metric");            
          $nameTag=$objDOM->createElement("Metricname",$_REQUEST['name']);
          $emailTag=$objDOM->createElement("datasource",$_REQUEST['email']);
          $visualizationname_Tag=$objDOM->createElement("visualizationname",$_REQUEST['visualizationname']);
          $visualizationlink_Tag=$objDOM->createElement("visualizationlink",$_REQUEST['visualizationlink']);
          $description_Tag=$objDOM->createElement("description",$_REQUEST['description']);
              
          $dataTags->appendChild($nameTag);
          $dataTags->appendChild($emailTag);
          $dataTags->appendChild($visualizationname_Tag);
          $dataTags->appendChild($visualizationlink_Tag);
          $dataTags->appendChild($description_Tag);
          $rootTag_team->appendChild($dataTags);
          $objDOM->save("b.xml");
          echo 'metric successfully added to metric team type';
        }
        elseif($_REQUEST['Type']==$project){
          $dataTags=$objDOM->createElement("Metric");            
          $nameTag=$objDOM->createElement("Metricname",$_REQUEST['name']);
          $emailTag=$objDOM->createElement("datasource",$_REQUEST['email']);
          $visualizationname_Tag=$objDOM->createElement("visualizationname",$_REQUEST['visualizationname']);
          $visualizationlink_Tag=$objDOM->createElement("visualizationlink",$_REQUEST['visualizationlink']);
          $description_Tag=$objDOM->createElement("description",$_REQUEST['description']);
              
          $dataTags->appendChild($nameTag);
          $dataTags->appendChild($emailTag);
          $dataTags->appendChild($visualizationname_Tag);
          $dataTags->appendChild($visualizationlink_Tag);
          $dataTags->appendChild($description_Tag);
          $rootTag_project->appendChild($dataTags);
          $objDOM->save("b.xml");
          echo 'metric successfully added to metric project type';
        }
        else
              {
              echo 'metric type does not exist';
              echo $_REQUEST['Type'];
            }         
        
           return view('sample')->with('status','metric successfully added');
        // return back()->with('status','metric successfully added');
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
