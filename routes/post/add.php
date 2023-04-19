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
$id = uuidv4();

database_query_prepare("INSERT INTO pesan (id, name, pesan, time, count) VALUES (?,?,?,?,?)");
database_query_bind("sssii", $id, $name, $pesan, time(), 0);
database_query_execute();

// redirect the user back to the maaf page
header_redirect_page("maaf&id=$id");
