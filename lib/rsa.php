<?php
	include 'config/config.php';

	function getSignContent($header, $body) {
		$verify_request_param = [];
		$response = [];

		$verify_request_param['verify'] = $header;
		$verify_request_param['params'] = $body;
		
		$json_request_body = json_encode($verify_request_param['params'], JSON_UNESCAPED_SLASHES);
		$json_request_header = json_encode($verify_request_param['verify']);
		
		$data = "params=".$json_request_body."&&verify=".$json_request_header;

		print_r($data);
		
		$signature = rsaSign($data);
		$response = [
			'signature' => $signature,
			'valid' => rsaVerify($data, $signature)
		];

		return $response;
	}

	function rsaSign($rsa_data){
		$private_Key = openssl_pkey_get_private(PRIVATE_KEY);
		
		if("RSA2" == SIGN_TYPE) {
			$signature = openssl_sign($rsa_data, $sign, $private_Key, OPENSSL_ALGO_SHA256) ? base64_encode($sign) : null;
		}
		else {
			$signature = openssl_sign($rsa_data, $sign, $private_Key) ? base64_encode($sign) : null;
		}

		return $signature;
	}

	function rsaVerify($rsa_data, $sign){
		$public_Key = openssl_pkey_get_public(PUBLIC_KEY);

		if("RSA2" == SIGN_TYPE) {
			$verify_signature = openssl_verify($rsa_data, base64_decode($sign), $public_Key, OPENSSL_ALGO_SHA256);
		}
		else {
			$verify_signature = openssl_verify($rsa_data, base64_decode($sign), $public_Key);
		}

		if ($verify_signature) {
		    return true;
		} else {
		    return false;
		}
	}
