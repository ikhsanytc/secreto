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

database_query_prepare('SELECT * FROM pesan WHERE id=?');
database_query_bind('i', $id);
database_query_execute();
$pesan = database_query_result();

database_query_prepare('INSERT INTO komen (id, pesan, time) VALUES (?,?,?)');
database_query_bind("ssi", $id, $komen, time());
database_query_execute();

database_query_prepare('UPDATE pesan SET count=? WHERE id=?');
$count = $pesan[0]['count'] + 1;
database_query_bind("ii", $count, $id);
database_query_execute();
