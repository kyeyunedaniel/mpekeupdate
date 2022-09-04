
<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;


class CartController extends Controller
{
	
}

// Set API access key 
$queryString = http_build_query([ 
  'access_key' => 'YOUR_ACCESS_KEY' 
]); 
 
// API URL with query string 
$apiURL = sprintf('%s?%s', 'http://api.marketstack.com/v1/exchanges', $queryString); 
 
// Initialize cURL 
$ch = curl_init(); 
 
// Set URL and other appropriate options 
curl_setopt($ch, CURLOPT_URL, $apiURL); 
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
 
// Execute and get response from API 
$api_response = curl_exec($ch); 
 
// Close cURL 
curl_close($ch);