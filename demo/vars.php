<?php
//include conf file
require_once($_SERVER['DOCUMENT_ROOT'] . '/' . 'conf.php');

//get $loader object 
$loader = pnf\loader::getInstance();

//specify page title
$loader->seo["title"] = "Vars page title";

//redefine some of $loader->views values
$loader->modules["main"] = "demo/myvars.php";

$loader->modules["item1"] = "demo/myvars_get.php";

//load views to template and show page
$loader->printPage();