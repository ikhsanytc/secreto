<?php

$_ENV["routing_is_get"] = false;
$_ENV["routing_is_api"] = false;
$_ENV["routing_is_post"] = false;

/**
 * Initialize the routing system
 *
 * @return void
 */

function init_routing()
{

    $methods = ["get","api","post"];
    $method = $_GET["m"] ?? 0;
    $method = $methods[$method] ?? "get";

    $_ENV["routing_is_{$method}"] = true;

    $route = $_GET["r"] ?? "index";
    $route = preg_replace("/[^a-zA-Z0-9_\/]/", "", $route);
    $route_file = __APP_DIR__."/routes/{$method}/{$route}.php";

    if(!file_exists($route_file)) {
        http_response_code(400);
        layout_load_notfound();
        exit;
    } else {
        require $route_file;
        layout_load_main();
    }

}

/**
 * Check Whether the routing is a get request
 *
 * @return bool true if is a get request otherwise false
 */

function is_get()
{
    return (($_GET["m"] ?? 0) == 0);
}

/**
 * Check Whether the routing is a api request
 *
 * @return bool true if is a api request otherwise false
 */

function is_api()
{
    return (($_GET["m"] ?? 0) == 1);
}

/**
 * Check Whether the routing is a post request
 *
 * @return bool true if is a post request otherwise false
 */

function is_post()
{
    return (($_GET["m"] ?? 0) == 2);
}
