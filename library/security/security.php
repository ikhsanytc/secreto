<?php

$_ENV["security_encrypt_algo"] = "aes-256-cbc";

/**
 * Hash the given string
 *
 * @param string $string the string to be hashed
 * @return string the hashed string
 */

function security_hash(string $string)
{
    return strrev(hash("sha256", $string)).hash("sha256", $string);
}

/**
 * Hash the given string
 *
 * @param string $string the string to be hashed
 * @return string the hashed string
 */

function security_hash_sm(string $string)
{
    return strrev(hash("sha256", $string));
}

/**
 *
 * encrypt a value
 *
 * @param string $value the value to be encrypted
 * @param string $key   the encryption key
 * @return string the encrypted value
 *
 */

function security_encrypt(string $value, string $key)
{

    $iv = random_bytes(16);
    $cipher = openssl_encrypt($value, $_ENV["security_encrypt_algo"], $key, OPENSSL_RAW_DATA, $iv);
    return bin2hex($iv . $cipher);

}

/**
 *
 * decrypt a cipher
 *
 * @param string $cipher the cipher or the encrypted value
 * @param string $key    the encryption key
 * @return string|false the decrypted cipher or `FALSE` if failed
 *
 */

function security_decrypt(string $cipher, string $key)
{

    $iv = hex2bin(substr($cipher, 0, 32));
    $cipher = hex2bin(substr($cipher, 32));
    $decrypt = openssl_decrypt($cipher, $_ENV["security_encrypt_algo"], $key, OPENSSL_RAW_DATA, $iv);

    if($decrypt === false) {
        return false;
    }

    return $decrypt;

}

function e(string $string)
{
    return htmlspecialchars($string);
}
