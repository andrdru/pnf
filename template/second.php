<!DOCTYPE html>
<html>
<head>
	<?php $loader = pnf\loader::getInstance(); ?>
	<title><?= $loader->seo['title'] ?></title>
	<link rel="stylesheet" type="text/css" href="/css/style.css" media="all"/>
</head>
<body bgcolor="#add8e6">
second template
<div class="div-menu">
	<?php
	$loader->load("menu", "require");
	?>
</div>
<div class="div-main">
<?php
$loader->load("main");
?>
</div>
<div class="div-menu">
	<?php
	$loader->load("menu", "require");
	?>
</div>
<div class="div-footer">
	<?php
	$loader->load("item1");
	?>
</div>
</body>
</html>