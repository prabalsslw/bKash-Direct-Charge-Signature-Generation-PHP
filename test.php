<?php 
	include 'lib/signature.php';

	$body = '';

	echo "<pre>";
	print_r(prepare($body));
	// print_r(applyToken($body));
	// print_r(directDebit($body));
	// print_r(authPay($body));
	// print_r(capturePayment($body));
	// print_r(voidPayment($body));
	// print_r(inquiryPayment($body));
	// print_r(refund($body));
	// print_r(inquiryRefund($body));
	// print_r(cancelToken($body));
	// print_r(inquiryUserToken($body));
	// print_r(checkBalance($body));
?>