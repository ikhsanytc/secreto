<?php

/**
 * This file will serve as the layout file if the user is visitting a route that does not exist
 */
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=7">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <meta name="viewport" content="width=device-width, minimum-scale=1.0">
    <title>404</title>

</head>

<body>
    <div style="text-align: center;">
        <h1 style="font-weight: bold;">404</h1>
        <p>Page Is Not Found!</p>
        <p><a href="<?= URL_REDIRECT_GET ?>index" style="text-decoration: none; font-weight: bold; color: grey;">Return To Home</a></p>
    </div>

</body>

</html>