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
Open `config/config.php` and update below parameters. 