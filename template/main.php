<?php
use Pnf\Loader;

$loader = Loader::getInstance();
?><!DOCTYPE html>
<html>
<head>
    <title><?= $loader->seo['title'] ?></title>
</head>
<body>
main template
<div>
    <?php
    $loader->load("main");
    ?>
</div>
</body>
</html>