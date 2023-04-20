<?php

/**
 * Define the url
 *
 * @var string
 */

define("URL", "http://localhost/secreto/public");

/**
 * Define the url for redirecting
 *
 * @var string
 */

define("URL_REDIRECT_GET", URL . "/?m=0&r=");

/**
 * Define the url for redirecting with `API` request
 *
 * @var string
 */

define("URL_REDIRECT_API", URL . "/?m=1&r=");

/**
 * Define the url for redirecting with `POST` request
 *
 * @var string
 */

define("URL_REDIRECT_POST", URL . "/?m=2&r=");

/**
 * Define the url for redirecting into showing message
 *
 * @var string
 */

define("URL_REDIRECT_MESSAGE", URL . "/?message=");

/**
 * Define the url for the storage directory
 *
 * @var string
 */

define("STORAGE", URL . "/storage/");
