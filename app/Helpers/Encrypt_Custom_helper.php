<?php
function encrypt($plain_text)
{
    $encrypter = \Config\Services::encrypter();
    $ciphertext = bin2hex($encrypter->encrypt($plain_text));
    echo $ciphertext;
}

function decrypt($encrypt_text)
{
    $encrypter = \Config\Services::encrypter();
    return $encrypter->decrypt(hex2bin($encrypt_text));
}
