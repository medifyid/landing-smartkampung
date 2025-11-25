<?php

function custom_encrypt($string)
{
    $key = config('app.medify_encryption');
    $iv = substr($key, 0, 16); // IV 16 byte

    return base64_encode(openssl_encrypt($string, 'AES-256-CBC', $key, 0, $iv));
}

function custom_decrypt($encrypted)
{
    $key = config('app.medify_encryption');
    $iv = substr($key, 0, 16);

    return openssl_decrypt(base64_decode($encrypted), 'AES-256-CBC', $key, 0, $iv);
}
