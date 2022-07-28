<?php

    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, 'https://api-sandbox.transfeera.com/batch');
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS,
        "'transfers': [{
            'value': 25.0,
            'destination_bank_account': {
                'pix_key_type': 'EMAIL',
                'pix_key': 'pix@transfeera.com',
            }
        }]"
    );

    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_TIMEOUT, 10);

    $response = curl_exec($ch);

    curl_close($ch);
    echo $response;
    
?>