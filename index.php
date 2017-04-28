<?php
//controller file example

//include conf file
require_once($_SERVER['DOCUMENT_ROOT'] . '/' . 'conf.php');

//get $loader object 
$loader = pnf\Loader::getInstance();

//specify page title
$loader->seo["title"] = "Main page title";

//redefine some of $loader->modules values,like this
$loader->modules["main"] = "module.php";
//just demo, will not take any effect, it's already defined in /system/modules.php

//load modules to template and show page
$loader->printPage();