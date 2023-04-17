<?php

$_ENV["message_title"] = APP_TITLE;
$_ENV["message_text"] = null;
$_ENV["message_link"] = URL;
$_ENV["message_link_name"] = "Close";

function init_message()
{

    if(!isset($_GET["msg"])) {
        return;
    }

    $message = $_GET["msg"];
    $message = rtrim($message, "/");
    $message = preg_replace("/[^a-zA-Z0-9\_\/]/", "", $message);
    $message = __APP_DIR__."/app/message/{$message}.php";

    if(!file_exists($message)) {
        http_response_code(400);
        exit;
    }

    require $message;
    require __DIR__."/message_layout.php";
    exit;

}

/**
 * Set the message title
 *
 * @param string $title
 * @return void
 */

function message_set_title(string $title)
{
    $_ENV["message_title"] = $title;
}

/**
 * Set the message text
 *
 * @param string $text
 * @return void
 */

function message_set_text(string $text)
{
    $_ENV["message_text"] = $text;
}

/**
 * Set the message link
 *
 * @param string $link
 * @param string $link_name
 * @return void
 */

function message_set_link(string $link, string $link_name)
{
    $_ENV["message_link"] = $link;
    $_ENV["message_link_name"] = $link_name;
}
