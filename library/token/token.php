<?php

/**
 * Initialize tokenization
 *
 * @return void
 */

function init_token()
{

    if(!is_get()) {

        if(!isset($_POST["token"])) {
            http_response_code(400);
            exit;
        }

        if($_POST["token"] != $_SESSION["token"]) {
            http_response_code(400);
            exit;
        }

    }

    if(!is_api()) {
        $token = sha1(microtime());
        define("TOKEN", $token);
        $_SESSION["token"] = $token;
    } else {
        define("TOKEN", $_SESSION["token"] ?? "null");
        $_SESSION["token"] = $_SESSION["token"] ?? "null";
    }

}
