<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {

	$url = "https://test.oppwa.com/v1/payments";
	$amo = "91";
	$data = "entityId=8ac7a4c76ca93584016caee5a7161378" .
			(($amo=="92")? "&amount=$amo" : '') .
                "&currency=SAR" .
                "&paymentBrand=VISA" .
                "&paymentType=DB" .
                "&card.number=4111111111111111" .
                "&card.holder=Abdullah Mohamed" .
                "&card.expiryMonth=05" .
                "&card.expiryYear=2021" .
                "&card.cvv=123" .
                "&merchantTransactionId=1" .
                "&customer.email=iabdullah.beker@gmail.com" .
                "&billing.street1=elWaraq" .
                "&billing.city=Giza" .
                "&billing.state=Cairo" .
                "&billing.country=EG" .
                "&billing.postcode=11211" .
                "&customer.givenName=Abdullah" .
                "&customer.surname=Mohamed" .
                "&shopperResultUrl=https://test.com"
                ;

		// $display = 'start ' . ((!$amo=="92")? '92' : '0') . ' end ';
		// return $data;
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                   'Authorization:Bearer OGFjN2E0Yzc2Y2E5MzU4NDAxNmNhZWU0MjU5NDEzNzR8WXNhY3JiZ0s5Tg=='));
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);// this should be set to true in production
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$responseData = curl_exec($ch);
	if(curl_errno($ch)) {
		return curl_error($ch);
	}
	curl_close($ch);
	return $responseData;

});
