<?php

/**
 * Add Comment
 */
if (!isset($_POST['komen'])) {
    http_response_code(400);
    exit;
}
if (!isset($_POST['id'])) {
    http_response_code(400);
    exit;
}

$komen = $_POST['komen'];
$komen = remove_emoji($komen);  // remove emoji from komen (apparently 000webhost database seems to not support emoji)

if(empty($komen)) {
    exit;
}

$id = $_POST['id'];

database_query_prepare('SELECT COUNT(*) FROM pesan WHERE id=?');
database_query_bind('s', $id);
database_query_execute();

if(database_query_result_count() == 0) {
    http_response_code(400);
    exit;
}

database_query_prepare('INSERT INTO komen (id, pesan, time) VALUES (?,?,?)');
database_query_bind("ssi", $id, $komen, time());
database_query_execute();

database_query_prepare('UPDATE pesan SET count=count+1 WHERE id=?');
database_query_bind("s", $id);
database_query_execute();
