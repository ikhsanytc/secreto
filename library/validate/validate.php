<?php

$_ENV["validate_alpha"] = "/[a-zA-Z]/";
$_ENV["validate_alnum"] = "/[a-zA-Z0-9]/";
$_ENV["validate_digit"] = "/[0-9]/";
$_ENV["validate_name"] = "/[a-zA-Z0-9\'\-\. ]/";
$_ENV["validate_username"] = "/[a-zA-Z0-9\@\-\_]/";
$_ENV["validate_email"] = "/[a-zA-Z0-9!#$%&'*+\-\/=?^_`{|}~]{1,64}@[a-zA-Z0-9\-\.]{1,255}/";
$_ENV["validate_phone"] = "/\+\d{1,3}( |-|)\d{3,4}( |-|)\d{3,4}( |-|)\d{3,4}/";

/**
 * Validate whether the given string is a valid alpha
 *
 * @param string $value the value
 * @return bool `TRUE` if valid otherwise `FALSE`
 */

function validate_alpha(string $value)
{
    return empty(preg_replace($_ENV["validate_alpha"], "", $value));
}

/**
 * Validate whether the given string is a valid alnum
 *
 * @param string $value the value
 * @return bool `TRUE` if valid otherwise `FALSE`
 */

function validate_alnum(string $value)
{
    return empty(preg_replace($_ENV["validate_alnum"], "", $value));
}

/**
 * Validate whether the given string is a valid digit
 *
 * @param string $value the value
 * @return bool `TRUE` if valid otherwise `FALSE`
 */

function validate_digit(string $value)
{
    return empty(preg_replace($_ENV["validate_digit"], "", $value));
}

/**
 * Validate whether the given string is a valid name
 *
 * @param string $value the value
 * @return bool `TRUE` if valid otherwise `FALSE`
 */

function validate_name(string $value)
{
    return empty(preg_replace($_ENV["validate_name"], "", $value));
}

/**
 * Validate whether the given string is a valid username
 *
 * @param string $value the value
 * @return bool `TRUE` if valid otherwise `FALSE`
 */

function validate_username(string $value)
{
    return empty(preg_replace($_ENV["validate_username"], "", $value));
}

/**
 * Validate whether the given string is a valid email
 *
 * @param string $value the value
 * @return bool `TRUE` if valid otherwise `FALSE`
 */

function validate_email(string $value)
{
    return empty(preg_replace($_ENV["validate_email"], "", $value));
}

/**
 * Validate whether the given string is a valid phone
 *
 * @param string $value the value
 * @return bool `TRUE` if valid otherwise `FALSE`
 */

function validate_phone(string $value)
{
    return empty(preg_replace($_ENV["validate_phone"], "", $value));
}
