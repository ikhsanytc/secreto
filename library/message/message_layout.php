<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?= APP_DESCRIPTION ?>">
    <meta name="keywords" content="<?= APP_KEYWORD ?>">
    <title><?=e( $_ENV["message_title"] )?></title>

    <link rel="stylesheet" href="<?= URL ?>css/style.min.css">

</head>
<body id="body">

    <div class="hd-container-small hd-mt-6">
        <div class="hd-card">
            <div class="hd-container">
                <h1 class="hd-text-large"><?=e( $_ENV["message_title"] )?></h1>
            </div>
            <hr>
            <div class="hd-container">
                <p><?=e( $_ENV["message_text"] )?></p>
            </div>
            <div class="hd-container">
                <a onclick="document.location.replace('<?= URL_REDIRECT_GET ?><?=e( $_ENV['message_link'] )?>')">
                    <button class="hd-btn hd-dark"><?=e( $_ENV["message_link_name"] )?></button>
                </a>
            </div>
        </div>
    </div>

</body>
</html>
