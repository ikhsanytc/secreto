<?php
/**
 * This file will serve as the layout file
 */
if(isset($_ENV["layout_source"])) {
    require __APP_DIR__."/app/source/{$_ENV['layout_source']}";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=7">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <meta name="viewport" content="width=device-width, minimum-scale=1.0">
    <meta name="description" content="<?= $_ENV["layout_description"] ?? APP_DESCRIPTION ?>">
    <meta name="keywords" content="<?= $_ENV["layout_keyword"] ?? APP_KEYWORD ?>">
    <title><?= $_ENV["layout_title"] ?? APP_TITLE ?></title>

    <?php if(isset($_ENV["layout_style"])): ?>
        <link rel="stylesheet" href="<?= URL ?>css/<?= $_ENV["layout_style"] ?>">
    <?php endif; ?>

</head>
<body>

    <?php require __APP_DIR__."/app/page/{$_ENV['layout_view']}" ?>

</body>
</html>
