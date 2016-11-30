<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/' . 'conf.php');
$loader = pnf\loader::getInstance();
$loader->seo["title"] = "Form page title";
$loader->modules["main"] = "demo/form.php";
$loader->printPage();