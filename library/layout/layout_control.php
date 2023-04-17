<?php

$_ENV["layout_title"] = null;
$_ENV["layout_description"] = null;
$_ENV["layout_keyword"] = null;
$_ENV["layout_style"] = null;
$_ENV["layout_view"] = null;
$_ENV["layout_source"] = null;

/**
 * Set the layout title
 *
 * @param string $title
 * @return void
 */

function set_title(string $title)
{
    $_ENV["layout_title"] = $title;
}

/**
 * Set the layout description
 *
 * @param string $description
 * @return void
 */

function set_description(string $description)
{
    $_ENV["layout_description"] = $description;
}

/**
 * Set the layout keyword
 *
 * @param string $keyword
 * @return void
 */

function set_keyword(string $keyword)
{
    $_ENV["layout_keyword"] = $keyword;
}

/**
 * Set the layout style
 *
 * @param string $style
 * @return void
 */

function set_style(string $style)
{
    $_ENV["layout_style"] = $style;
}

/**
 * Set the layout view
 *
 * @param string $view
 * @return void
 */

function set_view(string $view)
{
    $_ENV["layout_view"] = $view;
}

/**
 * Set the layout source
 *
 * @param string $source
 * @return void
 */

function set_source(string $source)
{
    $_ENV["layout_source"] = $source;
}

function layout_load_main()
{
    require __DIR__."/layout_main.php";
}

function layout_load_notfound()
{
    require __DIR__."/layout_notfound.php";
}
