<?php

/**
 * Send out a header for redirecting the user into a different url
 *
 * @param string $url the redirected url
 * @return void
 */

function header_redirect(string $url)
{
    header("Location: {$url}");
    exit;
}

/**
 * Send out a header for redirecting the user into a different page
 *
 * @return void
 */

function header_redirect_page(string $page)
{
    header("Location: ".URL_REDIRECT_GET.$page);
    exit;
}

/**
 * Send out a header for redirecting the user into a message
 *
 * @return void
 */

function header_redirect_message(string $message)
{
    header("Location: ".URL."?msg={$message}");
    exit;
}
