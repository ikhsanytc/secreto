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
database_query_prepare("SELECT * FROM komen WHERE id=?");
database_query_bind("s", $id);
database_query_execute();
$komen = database_query_result();
database_query_prepare('SELECT * FROM pesan WHERE id=?');
database_query_bind('s', $id);
database_query_execute();
$pesan = database_query_result()[0];
// example comment

require __APP_DIR__ . "/app/component/comment.php";
