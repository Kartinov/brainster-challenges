<?php require_once __DIR__ . '/../config/head_config.php' ?>

<title><?= $PAGE_TITLE ?></title>

<?php if ($CURRENT_PAGE == "home") : ?>

    <meta name="description" content="Website Builder" />
    <meta name="author" content="Dimche Kartinov" />

<?php endif ?>

<meta charset="utf-8" />
<meta name="viewport" content="width=device-width,initial-scale=1.0" />

<link rel="stylesheet" href="<?= asset("css/bootstrap.min.css") ?>">
<link rel="stylesheet" href="<?= asset("css/custom-styles.css") ?>">