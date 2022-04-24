<?php

function callToApi($url, $header, $request_body, $clientID) {
    $curl = curl_init();

    curl_setopt_array($curl, array(
    CURLOPT_URL => $url,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_CUSTOMREQUEST => 'POST',
    CURLOPT_POSTFIELDS => $request_body,
    CURLOPT_HTTPHEADER => array(
        'Content-Type: application/json; charset=UTF-8',
        'client-id: '.$clientID,
        'signature: signature='.$header,
        'request-time: '.date('Y-m-d\TH:i:s.Z')
        ),
    ));

    $response = curl_exec($curl);

    curl_close($curl);
    return $response;
}


