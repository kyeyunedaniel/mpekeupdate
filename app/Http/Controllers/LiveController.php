<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// require_once $path=bath_path('vendor/pear/http_request2/HTTP/Request2');

class LiveController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
               
                // This sample uses the Apache HTTP client from HTTP Components (http://hc.apache.org/httpcomponents-client-ga/)
                require_once 'HTTP/Request2.php';

                $request = new \Http_Request2('https://sandbox.momodeveloper.mtn.com/collection/v1_0/bc-authorize');
                // dd($request)
                //https://sandbox.momodeveloper.mtn.com/collection/v1_0/bc-authorize
                $url = $request->getUrl();

                function gen_uuid() {
                  return sprintf( '%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
                  // 32 bits for "time_low"
                  mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ),
                  // 16 bits for "time_mid"
                  mt_rand( 0, 0xffff ),
                  // 16 bits for "time_hi_and_version",
                  // four most significant bits holds version number 4
                  mt_rand( 0, 0x0fff ) | 0x4000,
                  // 16 bits, 8 bits for "clk_seq_hi_res",
                  // 8 bits for "clk_seq_low",
                  // two most significant bits holds zero and one for variant DCE1.1
                  mt_rand( 0, 0x3fff ) | 0x8000,
                  // 48 bits for "node"
                  mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff )
                  );
                }

                $uuid=gen_uuid();
                $api_key='fcy-rfkyugkugkiugbkiu';
                $apiuser='gvyguikhulihj05185';
                $token=base64_encode($apiuser.':'.$api_key);

                $headers = array(
                    // Request headers
                    'Authorization' => 'Basic'.$token,
                    'X-Target-Environment' => 'mtnuganda',
                    'X-Callback-Url' => '',
                    'Content-Type' => 'application/x-www-form-urlencoded',
                    'Ocp-Apim-Subscription-Key' => 'c1dc457fea64434bac36ff1f4958a851',//
                );

                $request->setHeader($headers);

                $parameters = array(
                    // Request parameters
                );

                $url->setQueryVariables($parameters);

                $request->setMethod(\HTTP_Request2::METHOD_POST);

                // Request body
                $request->setBody("{body}");

                try
                {
                    $response = $request->send();
                    // echo $response->getBody();
                    $access_token=json_decode($response->getBody());
                    $access_token=$access_token->access_token();
                }
                catch (HttpException $ex)
                {
                    echo $ex;
                }

                //pay request
                $request = new \Http_Request2('https://sandbox.momodeveloper.mtn.com/collection/v1_0/requesttopay');
                $url = $request->getUrl();

                $headers = array(
                    // Request headers
                    'Authorization' => 'Bearer'.$access_token,
                    'X-Callback-Url' => 'https://momodeveloper.mtn.com/go-live',//to change
                    'X-Reference-Id' => '$uuid',
                    'X-Target-Environment' => 'mtnuganda',
                    'Content-Type' => 'application/json;charset=utf-8',
                    'Ocp-Apim-Subscription-Key' => 'c1dc457fea64434bac36ff1f4958a851',
                );

                $request->setHeader($headers);

                $parameters = array(
                    // Request parameters
                );

                $url->setQueryVariables($parameters);
                $body=array(
                // {
                //                   "amount": "2",
                //                   "currency": "ugx",
                //                   "externalId": $uuid,
                //                   "payer"=>array(
                //                     "partyIdType": "MSISDN",
                //                     "partyId": "21345679"
                //                   ),
                //                   "payerMessage": "test",
                //                   "payeeNote": "note ",}
                    
                );

                $request->setMethod(HTTP_Request2::METHOD_POST);

                // Request body
                $request->setBody("{body}");

                try
                {
                    $response = $request->send();
                    dd($response->getBody());
                }
                catch (HttpException $ex)
                {
                    dd($ex);
                }


                
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
