<?php require_once __DIR__ . '/../autoload.php' ?>

<!DOCTYPE html>
<html>

<head>
    <?php require_once __DIR__ . '/head_tag_contents.php' ?>
</head>

<body <?php if ($CURRENT_PAGE === 'Company') {
    echo "data-spy='scroll' data-target='#main-nav' data-offset='70' id='home' class='company-body position-relative'";
} ?>>