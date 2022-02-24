<?php

use natoxCore\Config;
use natoxCore\Session;

?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="<?= ROOT ?>public/assets/css/all.css">
    <link rel="stylesheet" href="<?= ROOT ?>public/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= ROOT ?>public/assets/css/natox.css?v=<?= Config::get("version") ?>">
    <?php $this->content('head') ?>
    <title>Natox | <?= $this->getSiteTitle() ?></title>
</head>

<body>

    <div class="container">
        <?= Session::displaySessionAlerts(); ?>
        <?php $this->content('content') ?>
    </div>

    <script src="<?= ROOT ?>public/assets/js/bootstrap.bundle.min.js"></script>
    <script src="<?= ROOT ?>public/assets/js/natox.js?v=<?= Config::get("version") ?>"></script>
    <?php $this->content('footer') ?>
</body>

</html>