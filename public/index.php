<?php

define("__APP_DIR__", __DIR__ . "/..");
session_start();

require __APP_DIR__ . "/config/app.php";
require __APP_DIR__ . "/config/url.php";
require __APP_DIR__ . "/config/email.php";
require __APP_DIR__ . "/config/database.php";
require __APP_DIR__ . "/library/uuid/uuid.php";
require __APP_DIR__ . "/library/token/token.php";
require __APP_DIR__ . "/library/header/header.php";
require __APP_DIR__ . "/library/routing/routing.php";
require __APP_DIR__ . "/library/message/message.php";
require __APP_DIR__ . "/library/security/security.php";
require __APP_DIR__ . "/library/validate/validate.php";
require __APP_DIR__ . "/library/database/database.php";
require __APP_DIR__ . "/library/layout/layout_control.php";

init_message();
init_token();
init_database();
init_routing();
