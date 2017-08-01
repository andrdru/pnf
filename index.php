<?php
//controller file example
//include conf file
require_once($_SERVER['DOCUMENT_ROOT'] . '/' . 'conf.php');

use Pnf\Loader;

//get $loader object
$loader = Loader::getInstance();
//specify page title
$loader->seo["title"] = "Main page title";
//redefine some of $loader->modules values,like this
$loader->modules["main"] = "module.php";
//it's already defined in /config/modules.php

//load modules to template and show page
$loader->printPage();