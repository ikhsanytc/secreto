<?php

/**
 * Store the database connection
 *
 * @var mysqli
 */

$_ENV["database_conn"] = null;

/**
 * Store the database stmt
 *
 * @var mysqli_stmt
 */

$_ENV["database_stmt"] = null;

/**
 * to make it easy i created this variable which had value of 1 why i created
 * this? i created it just so it is much easier to interpret cause query result
 * for boolean value are returned in integer not actual boolean e.g `TRUE` or `FALSE`
 *
 * @var true
 */

define("MYSQL_TRUE", 1);

/**
 * to make it easy i created this variable which had value of 0 why i created
 * this? i created it just so it is much easier to interpret cause query result
 * for boolean value are returned in integer not actual boolean e.g `TRUE` or `FALSE`
 *
 * @var false
 */

define("MYSQL_FALSE", 0);

/**
 * Establish a connection to the database
 *
 * @return void
 */

function init_database()
{
    $_ENV["database_conn"] = mysqli_connect(DATABASE_HOST, DATABASE_USERNAME, DATABASE_PASSWORD, DATABASE);
}

/**
 * Execute a query on the database
 *
 * @return mysqli_result|bool For successful `SELECT`, `SHOW`, `DESCRIBE` or
 *                            `EXPLAIN` queries, it will return a `mysqli_result`
 *                            object. For other successful queries it will
 *                            return `TRUE`.
 */

function database_query(string $query)
{
    return mysqli_query($_ENV["database_conn"], $query);
}

/**
 * Prepare a query for execute in the database
 *
 * @return void
 */

function database_query_prepare(string $query)
{
    $_ENV["database_stmt"] = mysqli_prepare($_ENV["database_conn"], $query);
}

/**
 * Bind parameter into the query
 *
 * @param string $types   the parameter types
 * @param mixed  &$values the values to be binded
 * @return void
 */

function database_query_bind(string $types, ...$values)
{
    mysqli_stmt_bind_param($_ENV["database_stmt"], $types, ...$values);
}

/**
 * Execute the query
 *
 * @return void
 */

function database_query_execute()
{
    mysqli_stmt_execute($_ENV["database_stmt"]);
}

/**
 * Get the result from the prepared query
 *
 * @return array the result as an associative array
 */

function database_query_result()
{

    $result = mysqli_stmt_get_result($_ENV["database_stmt"]);
    $rows = [];

    while($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }

    return $rows;

}

/**
 * Get the result from the prepared query
 * **note** only for `SELECT COUNT(*)` query
 *
 * @return array the result as an associative array
 */

function database_query_result_count()
{

    $result = mysqli_stmt_get_result($_ENV["database_stmt"]);
    $rows = [];

    while($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }

    return $rows[0]["COUNT(*)"];

}
