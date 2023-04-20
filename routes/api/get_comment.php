<?php

/**
 * Get the comment
 */
// if (!isset($pesan['id'])) {
//     die();
// }
if (!isset($_GET['id'])) {
    http_response_code(400);
    exit;
}

$id = $_GET['id'];

database_query_prepare('SELECT COUNT(*) FROM pesan WHERE id=?');
database_query_bind('s', $id);
database_query_execute();

if(database_query_result_count() == 0) {
    http_response_code(400);
    exit;
}

database_query_prepare("SELECT * FROM komen WHERE id=? ORDER BY time DESC");
database_query_bind("s", $id);
database_query_execute();
$komen = database_query_result();

// example comment

require __APP_DIR__ . "/app/component/comment.php";
