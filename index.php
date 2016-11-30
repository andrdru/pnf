<?php
//controller file example

//include conf file
require_once($_SERVER['DOCUMENT_ROOT'] . '/' . 'conf.php');

//get $loader object 
$loader = pnf\loader::getInstance();

//specify page title
$loader->seo["title"] = "Main page title";

//redefine some of $loader->views values,like this
//$loader->views["main"] = "main.php"; //this will not take any effect, it's already defined

//load views to template and show page
$loader->printPage();