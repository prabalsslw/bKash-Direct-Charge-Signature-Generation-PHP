<?php 
	include 'lib/signature.php';

	$body = '{
    "verify": {
        "version": "1.0.0",
        "timestamp": "2022-03-17 16:08:03",
        "merchantShortCode": "60044",
        "signature":"gLnev9QDC4MfaHgAVR+D02O2NRu/crKhoQgQCZcqvkL+l4S0a01fCYLkPDC+OsMMknct78BqRl5doquw9goZKd7EaG70atLqRETOqbdOPQ6IAozoJr1ZiArUxVYgIsUdrkYPuvtqCNf+4FGKq1jFtXoYHDS9ZCTmcd2wBwfFoiiectr9LVmUhdI4Sv9Ws8yyuUB+cnxUP7JNjD2JCAF8sOkcZEn17ufsFSPh+8bNktD5O2J7sVSLfD10ZU3hW1xkzJ44u5O3aYIMYaw5wtgFWLGUcoUFOay66NFLVZPowwk2r/5IEpvFzFrLYjAbNMmZdCfxnPW2a8Oz170O0O2H74u4rL1jRw5y7JLNjKi6nEKpvTWTfXEv2HBuvt/Wopbsktyf1WkHMzTnBZFZg+u89cRDLtnHx43/zp4AGLWWfFLBCvLKD19whvoQCs2W6/CS4jyGceIr6891IBqcKBtgllWvonscMUvh6ySe3nEWQht/7G3d8F+vyw04z9vbw3nBFoEgb65+czxdeTgkuCbj6X/UBmV8CEc5qEiZ7cw4NxfIjA7TxsoXtnl4b+96JrGQtYvy7L5HQFV1Twz4eTwE8A0A7uRD3ds1Dl6/d8Z2WvXF3MaDY8b9rys/nEzdJmVAZSoohgQuv8ZHJcqGSbztJNUKb3WuyS3FvMj0nrAWULQ="
    },
    "params": {
        "acquirerId": "102218800000000001",
        "pspId": "102208800000000001",
        "customerBelongsTo": "ALIPAY_CN",
        "authClientId": "Test_60044",
        "authRedirectUrl": "https://webhook.site/c251a5da-110a-47f9-9bc4-28cb1efb53ef",
        "scopes": [
            "AGREEMENT_PAY","USER_INFO"
        ],
        "authState": "663A8FA9-D836-48EE-8AA1-1FF682989DC7",
        "terminalType": "APP",
        "referenceAgreementId": "aNDJWQNNxxxxxxx01",
        "osType": "IOS",
        "osVersion": "11.0.2"
    }
}';

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