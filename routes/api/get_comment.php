<?php

/**
 * Get the comment
 */

// example comment
$_ENV["comments"] = [
    [
        "time" => time(),
        "comment" => "Lorem Ipsum Dolor Sit Amet",
    ],
    [
        "time" => time(),
        "comment" => "Lorem Ipsum Dolor Sit Amet",
    ],
    [
        "time" => time(),
        "comment" => "Lorem Ipsum Dolor Sit Amet",
    ],
];

require __APP_DIR__."/app/component/comment.php";
