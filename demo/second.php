<?php
//include conf file
require_once($_SERVER['DOCUMENT_ROOT'] . '/' . 'conf.php');

//get $loader object 
$loader = pnf\loader::getInstance();

//specify page title
$loader->seo["title"] = "Second page title";

//redefine some of $loader->views values
$loader->modules["main"] = "demo/item2.php";

//load views to template and show page
$loader->printPage("second.php");