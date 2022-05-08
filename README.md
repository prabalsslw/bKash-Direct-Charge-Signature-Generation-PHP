# bkash Direct Charge Signature Generation PHP Library
Include this library to generate the Signature for Direct Charge API 
### Signatur Generation Logic:
1. Firstly, need to verify the type of signature, private key, charset, API name.
2. Get requestBody, get the mandatory field based on the API name, then remove the “signature” field, finally sort all of parameters by ASCII code.
3. Private key should be in pkcs8 format. 
4. Create openssl signature.
5. Encrypts the bytes generated in step 4 based on Base64 and returns the signature in string format.

### Directory List
 ```
 |-- config/
    |-- config.php
 |-- lib/
    |-- rsa.php (core file)
    |-- signature.php (core file)
|-- example/
    |-- Bkash-logo.png (bKash Logo)
    |-- curl.php (core file)
    |-- index.php (Main Example File)
    |-- process_request.php (Backend Ajax File)
 |-- README.md
 |-- orders.sql (sample)
```

### Prerequisite & Configuration
Open `config/config.php` and update below **constant** parameters. 
> `define("SIGN_TYPE", "RSA2");  // RSA but it will be always RSA2`

> `define("CHARSET", "UTF-8");`

> `define("base_url", "");  // Set base url provided from bKash`

> `define("client_id", "Default");  // Default for Sandbox`

> `define("PRIVATE_KEY", "");  // Set Private Key provided from bKash`

> `define("PUBLIC_KEY", "");  // Set Public Key provided from bKash`

### Include Library
To add library with your project add below code.
`include '../lib/signature.php';`

### Call Library Function
1. **Prepare API:** Call the library function and pass Prepare API request body in JSON formate as a function parameter. Added `$body` example only for prepare API.
> `$body = '{
    "verify": {
        "version": "1.0.0",
        "timestamp": "2022-04-25 15:40:03",
        "merchantShortCode": "Shared By Kash",
        "signature":"Shared By Kash"
    },
    "params": {
        "acquirerId": "Shared By Kash",
        "pspId": "Shared By Kash",
        "customerBelongsTo": "Shared By Kash",
        "authClientId": "Shared By Kash",
        "authRedirectUrl": "https://example.com",
        "scopes": [
            "Shared By Kash"
        ],
        "authState": "Shared By Kash",
        "terminalType": "APP",
        "referenceAgreementId": "Shared By Kash",
        "osType": "Shared By Kash",
        "osVersion": "11.0.2"
    }
}`

> **`$signature = prepare($body);`**
2. **Apply Token/Bind:**
> **`$signature = applyToken($body);`**
3. **Derict Debit:**
> **`$signature = directDebit($body);`**
4. **Auth Payment:**
> **`$signature = authPay($body);`**
5. **Capture Payment:**
> **`$signature = capturePayment($body);`**
6. **Cancel/Void Payment:**
> **`$signature = voidPayment($body);`**
7. **Inquiry Payment:**
> **`$signature = inquiryPayment($body);`**
8. **Refund Payment:**
> **`$signature = refund($body);`**
9. **Inquiry Refund:**
> **`$signature = inquiryRefund($body);`**
10. **Cancel Token:**
> **`$signature = cancelToken($body);`**
11. **User Token/Bind Info:**
> **`$signature = inquiryUserToken($body);`**