<?php

/**
 * Execute this php code on the interpreter
 * this file will generate the database tables
 */

/**
 * Determine the database schema
 */

require __DIR__ . "/config/database.php";
require __DIR__ . "/library/database/database.php";

init_database();

$result = database_query("SHOW TABLES");
$tables = [];

while ($table = mysqli_fetch_assoc($result)) {
    $tables[] = $table["Tables_in_secreto"];
}

if (!in_array("secreto", $tables)) {
    database_query(file_get_contents(__DIR__ . "/database/secreto.sql"));
}
