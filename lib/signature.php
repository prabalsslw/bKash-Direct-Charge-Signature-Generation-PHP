<?php 
	include 'rsa.php';

	function prepare($body) {

		$request_body_array = json_decode($body, true);
		unset($request_body_array["verify"]["signature"]);

		$header = $request_body_array["verify"];
		$body = $request_body_array["params"];

		$params['customerBelongsTo'] = $body['customerBelongsTo'];
		$params['authClientId'] = $body['authClientId'];
		$params['scopes'] = $body['scopes'];
		$params['authRedirectUrl'] = $body['authRedirectUrl'];

		$verify['merchantShortCode'] = $header['merchantShortCode'];
		$verify['version'] = $header['version'];
		$verify['timestamp'] = $header['timestamp'];

		return getSignContent($verify, $params);
	}

	function applyToken($body) {

		$request_body_array = json_decode($body, true);
		unset($request_body_array["verify"]["signature"]);

		$header = $request_body_array["verify"];
		$body = $request_body_array["params"];

		$params['authCode'] = $body['authCode'];

		$verify['merchantShortCode'] = $header['merchantShortCode'];
		$verify['version'] = $header['version'];
		$verify['timestamp'] = $header['timestamp'];

		return getSignContent($verify, $params);
	}

	function directDebit($body) {

		$request_body_array = json_decode($body, true);
		unset($request_body_array["verify"]["signature"]);

		$header = $request_body_array["verify"];
		$body = $request_body_array["params"];

		$orderAmount = $body['order']['orderAmount'];
		$paymentAmount = $body['paymentAmount'];
		
		ksort($orderAmount);
		ksort($paymentAmount);

		$params['paymentRequestId'] = $body['paymentRequestId'];
		$params['orderDescription'] = $body['order']['orderDescription'];
		$params['paymentAmount'] = $paymentAmount;
		$params['merchantName'] = $body['order']['merchant']['merchantName'];
		$params['referenceOrderId'] = $body['order']['referenceOrderId'];
		$params['orderAmount'] = $orderAmount;
		$params['merchantMCC'] = $body['order']['merchant']['merchantMCC'];

		$verify['merchantShortCode'] = $header['merchantShortCode'];
		$verify['version'] = $header['version'];
		$verify['timestamp'] = $header['timestamp'];

		return getSignContent($verify, $params);
	}

	function authPay($body) {

		$request_body_array = json_decode($body, true);
		unset($request_body_array["verify"]["signature"]);

		$header = $request_body_array["verify"];
		$body = $request_body_array["params"];

		$orderAmount = $body['order']['orderAmount'];
		$paymentAmount = $body['paymentAmount'];
		
		ksort($orderAmount);
		ksort($paymentAmount);

		$params['paymentRequestId'] = $body['paymentRequestId'];
		$params['orderDescription'] = $body['order']['orderDescription'];
		$params['paymentAmount'] = $paymentAmount;
		$params['merchantName'] = $body['order']['merchant']['merchantName'];
		$params['referenceOrderId'] = $body['order']['referenceOrderId'];
		$params['orderAmount'] = $orderAmount;
		$params['merchantMCC'] = $body['order']['merchant']['merchantMCC'];

		$verify['merchantShortCode'] = $header['merchantShortCode'];
		$verify['version'] = $header['version'];
		$verify['timestamp'] = $header['timestamp'];

		return getSignContent($verify, $params);
	}

	function capturePayment($body) {

		$request_body_array = json_decode($body, true);
		unset($request_body_array["verify"]["signature"]);

		$header = $request_body_array["verify"];
		$body = $request_body_array["params"];

		$paymentAmount = $body['paymentAmount'];
		
		ksort($paymentAmount);

		$params['paymentRequestId'] = $body['paymentRequestId'];
		$params['captureRequestId'] = $body['captureRequestId'];
		$params['paymentAmount'] = $paymentAmount;

		$verify['merchantShortCode'] = $header['merchantShortCode'];
		$verify['version'] = $header['version'];
		$verify['timestamp'] = $header['timestamp'];

		return getSignContent($verify, $params);
	}

	function voidPayment($body) {

		$request_body_array = json_decode($body, true);
		unset($request_body_array["verify"]["signature"]);

		$header = $request_body_array["verify"];
		$body = $request_body_array["params"];

		$params['paymentRequestId'] = $body['paymentRequestId'];

		$verify['merchantShortCode'] = $header['merchantShortCode'];
		$verify['version'] = $header['version'];
		$verify['timestamp'] = $header['timestamp'];

		return getSignContent($verify, $params);
	}

	function inquiryPayment($body) {

		$request_body_array = json_decode($body, true);
		unset($request_body_array["verify"]["signature"]);

		$header = $request_body_array["verify"];
		$body = $request_body_array["params"];

		$params['paymentRequestId'] = $body['paymentRequestId'];

		$verify['merchantShortCode'] = $header['merchantShortCode'];
		$verify['version'] = $header['version'];
		$verify['timestamp'] = $header['timestamp'];

		return getSignContent($verify, $params);
	}

	function refund($body) {

		$request_body_array = json_decode($body, true);
		unset($request_body_array["verify"]["signature"]);

		$header = $request_body_array["verify"];
		$body = $request_body_array["params"];
		
		$refundAmount = $body['refundAmount'];
		ksort($refundAmount);

		$params['paymentRequestId'] = $body['paymentRequestId'];
		$params['refundRequestId'] = $body['refundRequestId'];
		$params['refundAmount'] = $refundAmount;

		$verify['merchantShortCode'] = $header['merchantShortCode'];
		$verify['version'] = $header['version'];
		$verify['timestamp'] = $header['timestamp'];

		return getSignContent($verify, $params);
	}

	function inquiryRefund($body) {

		$request_body_array = json_decode($body, true);
		unset($request_body_array["verify"]["signature"]);

		$header = $request_body_array["verify"];
		$body = $request_body_array["params"];

		$params['refundRequestId'] = $body['refundRequestId'];

		$verify['merchantShortCode'] = $header['merchantShortCode'];
		$verify['version'] = $header['version'];
		$verify['timestamp'] = $header['timestamp'];

		return getSignContent($verify, $params);	
	}

	function cancelToken($body) {

		$request_body_array = json_decode($body, true);
		unset($request_body_array["verify"]["signature"]);

		$header = $request_body_array["verify"];
		$body = $request_body_array["params"];

		$params['accessToken'] = $body['accessToken'];

		$verify['merchantShortCode'] = $header['merchantShortCode'];
		$verify['version'] = $header['version'];
		$verify['timestamp'] = $header['timestamp'];

		return getSignContent($verify, $params);
	}

	function inquiryUserToken($body) {

		$request_body_array = json_decode($body, true);
		unset($request_body_array["verify"]["signature"]);

		$header = $request_body_array["verify"];
		$body = $request_body_array["params"];

		$params['accessToken'] = $body['accessToken'];

		$verify['merchantShortCode'] = $header['merchantShortCode'];
		$verify['version'] = $header['version'];
		$verify['timestamp'] = $header['timestamp'];

		return getSignContent($verify, $params);
	}

	function checkBalance($body) {

		$request_body_array = json_decode($body, true);
		unset($request_body_array["verify"]["signature"]);

		$header = $request_body_array["verify"];
		$body = $request_body_array["params"];

		$orderAmount = $body['order']['orderAmount'];
		$paymentAmount = $body['paymentAmount'];
		
		ksort($orderAmount);
		ksort($paymentAmount);

		$params['paymentRequestId'] = $body['paymentRequestId'];
		$params['orderDescription'] = $body['order']['orderDescription'];
		$params['paymentAmount'] = $paymentAmount;
		$params['merchantName'] = $body['order']['merchant']['merchantName'];
		$params['referenceOrderId'] = $body['order']['referenceOrderId'];
		$params['orderAmount'] = $orderAmount;
		$params['merchantMCC'] = $body['order']['merchant']['merchantMCC'];

		$verify['merchantShortCode'] = $header['merchantShortCode'];
		$verify['version'] = $header['version'];
		$verify['timestamp'] = $header['timestamp'];

		return getSignContent($verify, $params);
	}

?>