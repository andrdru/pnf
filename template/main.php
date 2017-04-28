<!DOCTYPE html>
<html>
<head>
    <?php $loader = pnf\Loader::getInstance(); ?>
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