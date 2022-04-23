<?php 
	include '../lib/signature.php';

	if (!empty($_POST['mtd']) && !empty($_POST['rbod'])) {
		$body = $_POST['rbod'];
		
		switch($_POST['mtd']) {
			case "prepare":
				echo json_encode(prepare($body) , JSON_PRETTY_PRINT);
				break;
			case "applytoken":
				echo json_encode(applyToken($body) , JSON_PRETTY_PRINT);
				break;
			case "directpay":
				echo json_encode(directDebit($body) , JSON_PRETTY_PRINT);
				break;
			case "auth":
				echo json_encode(authPay($body) , JSON_PRETTY_PRINT);
				break;
			case "capture":
				echo json_encode(capturePayment($body) , JSON_PRETTY_PRINT);
				break;
			case "void":
				echo json_encode(voidPayment($body) , JSON_PRETTY_PRINT);
				break;
			case "inquirypayment":
				echo json_encode(inquiryPayment($body) , JSON_PRETTY_PRINT);
				break;
			case "refund":
				echo json_encode(refund($body) , JSON_PRETTY_PRINT);
				break;
			case "inquiryrefund":
				echo json_encode(inquiryRefund($body) , JSON_PRETTY_PRINT);
				break;
			case "canceltoken":
				echo json_encode(cancelToken($body) , JSON_PRETTY_PRINT);
				break;
			case "userinfo":
				echo json_encode(inquiryUserToken($body) , JSON_PRETTY_PRINT);
				break;
			default:
    			echo "No method selected!";
		}
	}

?>