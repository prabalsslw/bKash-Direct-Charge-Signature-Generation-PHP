<?php 
	include '../lib/signature.php';
	include 'curl.php';

	if (!empty($_POST['mtd']) && !empty($_POST['rbod'])) {

		$body = $_POST['rbod'];
		
		switch($_POST['mtd']) {
			case "prepare":
				$api_url = base_url."oauths/prepare";
				$sign = prepare($body);

				if(!empty($_POST['sig'])) {
					$api_response = json_decode(callToApi($api_url, $_POST['sig'], $body, client_id), true);
				} else {
					$api_response = null;
				}
				
				$data = [
					'sign_key' => $sign,
					'api_response' => $api_response
				];
				echo json_encode($data , JSON_PRETTY_PRINT);
				break;

			case "applytoken":
				$api_url = base_url."oauths/applyToken";
				$sign = applyToken($body);

				if(!empty($_POST['sig'])) {
					$api_response = json_decode(callToApi($api_url, $_POST['sig'], $body, client_id), true);
				} else {
					$api_response = null;
				}

				$data = [
					'sign_key' => $sign,
					'api_response' => $api_response
				];
				echo json_encode($data , JSON_PRETTY_PRINT);
				break;

			case "directpay":
				$api_url = base_url."payments/pay";
				$sign = directDebit($body);
				
				if(!empty($_POST['sig'])) {
					$api_response = json_decode(callToApi($api_url, $_POST['sig'], $body, client_id), true);
				} else {
					$api_response = null;
				}

				$data = [
					'sign_key' => $sign,
					'api_response' => $api_response
				];
				echo json_encode($data , JSON_PRETTY_PRINT);
				break;

			case "auth":
				$api_url = base_url."payments/pay";
				$sign = authPay($body);

				if(!empty($_POST['sig'])) {
					$api_response = json_decode(callToApi($api_url, $_POST['sig'], $body, client_id), true);
				} else {
					$api_response = null;
				}

				$data = [
					'sign_key' => $sign,
					'api_response' => $api_response
				];
				echo json_encode($data , JSON_PRETTY_PRINT);
				break;

			case "capture":
				$api_url = base_url."payments/capture";
				$sign = capturePayment($body);

				if(!empty($_POST['sig'])) {
					$api_response = json_decode(callToApi($api_url, $_POST['sig'], $body, client_id), true);
				} else {
					$api_response = null;
				}

				$data = [
					'sign_key' => $sign,
					'api_response' => $api_response
				];
				echo json_encode($data , JSON_PRETTY_PRINT);
				break;

			case "void":
				$api_url = base_url."payments/cancelPayment";
				$sign = voidPayment($body);

				if(!empty($_POST['sig'])) {
					$api_response = json_decode(callToApi($api_url, $_POST['sig'], $body, client_id), true);
				} else {
					$api_response = null;
				}

				$data = [
					'sign_key' => $sign,
					'api_response' => $api_response
				];
				echo json_encode($data , JSON_PRETTY_PRINT);
				break;

			case "inquirypayment":
				$api_url = base_url."payments/inquiryPayment";
				$sign = inquiryPayment($body);

				if(!empty($_POST['sig'])) {
					$api_response = json_decode(callToApi($api_url, $_POST['sig'], $body, client_id), true);
				} else {
					$api_response = null;
				}

				$data = [
					'sign_key' => $sign,
					'api_response' => $api_response
				];
				echo json_encode($data , JSON_PRETTY_PRINT);
				break;

			case "refund":
				$api_url = base_url."payments/refund";
				$sign = refund($body);

				if(!empty($_POST['sig'])) {
					$api_response = json_decode(callToApi($api_url, $_POST['sig'], $body, client_id), true);
				} else {
					$api_response = null;
				}

				$data = [
					'sign_key' => $sign,
					'api_response' => $api_response
				];
				echo json_encode($data , JSON_PRETTY_PRINT);
				break;

			case "inquiryrefund":
				$api_url = base_url."payments/inquiryRefund";
				$sign = inquiryRefund($body);

				if(!empty($_POST['sig'])) {
					$api_response = json_decode(callToApi($api_url, $_POST['sig'], $body, client_id), true);
				} else {
					$api_response = null;
				}

				$data = [
					'sign_key' => $sign,
					'api_response' => $api_response
				];
				echo json_encode($data , JSON_PRETTY_PRINT);
				break;

			case "canceltoken":
				$api_url = base_url."oauths/cancelToken";
				$sign = cancelToken($body);

				if(!empty($_POST['sig'])) {
					$api_response = json_decode(callToApi($api_url, $_POST['sig'], $body, client_id), true);
				} else {
					$api_response = null;
				}

				$data = [
					'sign_key' => $sign,
					'api_response' => $api_response
				];
				echo json_encode($data , JSON_PRETTY_PRINT);
				break;

			case "userinfo":
				$api_url = base_url."users/inquiryUserInfo";
				$sign = inquiryUserToken($body);

				if(!empty($_POST['sig'])) {
					$api_response = json_decode(callToApi($api_url, $_POST['sig'], $body, client_id), true);
				} else {
					$api_response = null;
				}

				$data = [
					'sign_key' => $sign,
					'api_response' => $api_response
				];
				echo json_encode($data , JSON_PRETTY_PRINT);
				break;
			default:
    			echo "No method selected!";
		}
	}

?>