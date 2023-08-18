<?php

require_once('helper/pesapalV30Helper.php');
include_once('top.php');

//STRUCTURE OF THE API LINK
//http://localhost/payments/iframe.php?first_name=Brian&last_name=Koskei&email=bkimutai2021%40gmail.com&phone_number=%2B254712035642&currency=KES&amount=1&reference=null&consumer_keys=checked&description=null

// temporary key starage... you can store this on db
// KenyanTest Consumer/secret keys.. you can replace this with your own set for live testing
// TEST CREDENTIAL LINK: https://developer.pesapal.com/api3-demo-keys.txt
// $consumer_key = "glQOo235Hn11sDOxD4y3G3/iPvktbCqm";
// $consumer_secret = "VUfMf/DdYhWt8isQQtdTw2jM+9c=";

$consumer_key = "qkio1BGGYAXTu2JOfm7XSXNruoZsrqEW";
$consumer_secret = "osGQ364R49cXKeOYSpaOnT++rHs=";

$api = 'demo';
if(isset($_GET['keys'])){
    $api = 'demo';
}else{
    $api = 'demo';  
}

// echo $api;

// Pesapal helper class
$pesapalV30Helper = new pesapalV30Helper($api);

// Step 1 Authentication
$access = $pesapalV30Helper->getAccessToken($consumer_key, $consumer_secret);
// print_r($access);
$access_token = $access->token;

// step 2 IPN URL Registration Endpoint
// $IPN_id = "7f462d26-018b-4a36-a04d-dff5624d41a0";
$callback_url = "http://localhost/payments/redirect.php";

$IPN_respose = $pesapalV30Helper->getNotificationId($access_token, $callback_url);

// This notification_id uniquely identifies the endpoint Pesapal will send alerts to whenever a payment status changes for each transaction processed via API 3.0
$IPN_id = $IPN_respose->ipn_id;

echo $IPN_id;

//get form details

    $ref				=  str_repeat('ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789',5);
    $reff= substr(str_shuffle($ref),0,10);


$order = array();
$order['id'] = $reff;
$order['currency'] = isset($_GET['currency']) ? $_GET['currency'] : '';
$order['amount'] = 1; // Format amount to 2 decimal places
$order['description'] = isset($_GET['description']) ? $_GET['description'] : '';
$order['callback_url'] = $callback_url; // URL user to be redirected to after payment
$order['notification_id'] = $IPN_id; // Unique transaction id, generated by merchant.
$order['language'] = 'EN';
$order['terms_and_conditions_id'] = '';
$order['phone_number'] = preg_replace("/[^0-9]/", "", str_replace(' ', '', isset($_GET['phone_number']) ? $_GET['phone_number'] : '')); // Optional if we have email
$order['email_address'] = isset($_GET['email']) ? $_GET['email'] : ''; // Optional if we have phone
$order['country_code'] = 'KE'; // ISO codes (2 digits)
$order['first_name'] = isset($_GET['first_name']) ? $_GET['first_name'] : '';
$order['middle_name'] = '';
$order['last_name'] = isset($_GET['last_name']) ? $_GET['last_name'] : '';
$order['line_1'] = 'Nairobi';
$order['line_2'] = 'Riverside';
$order['city'] = 'Nairobi';
$order['state'] = '';
$order['postal_code'] = '12345';
$order['zip_code'] = '';


// var_dump($order);
// var_dump($_GET);

// STEP 3 post the order request to pesapal
$data = $pesapalV30Helper->getMerchertOrderURL($order, $access_token);

// var_dump($data);

// Iframe source link 
$iframe_src = '';
if($data->redirect_url){
    $iframe_src = $data->redirect_url;
}
// The actual iframe page
include('./pay.php');

