<?php

/**
 * Process message here
 */

if (!isset($_POST['nama']) || !isset($_POST['pesan'])) {
    http_response_code(400);
    exit;
}

$name = $_POST['nama'];
$pesan = $_POST['pesan'];
$pesan = remove_emoji($pesan); // remove emoji from pesan (apparently 000webhost database seems to not support emoji)

if(empty($pesan)) {
    exit;
}

$id = uuidv4();

database_query_prepare("INSERT INTO pesan (id, name, pesan, time, count) VALUES (?,?,?,?,?)");
database_query_bind("sssii", $id, $name, $pesan, time(), 0);
database_query_execute();

// redirect the user back to the maaf page
header_redirect_page("maaf&id=$id");
