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
    $tables[] = $table["Tables_in_houdy"];
}

// if(!in_array("user", $tables)) {
//     database_query(file_get_contents(__DIR__."/database/user.sql"));
// }
// if(!in_array("user_index", $tables)) {
//     database_query(file_get_contents(__DIR__."/database/user_index.sql"));
// }
// if(!in_array("signup_verify", $tables)) {
//     database_query(file_get_contents(__DIR__."/database/signup_verify.sql"));
// }
