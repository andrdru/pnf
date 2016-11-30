<?php
//error reporting level
error_reporting(E_ALL);
ini_set('display_errors', 'on');

//define constants
define("PNF_SITE_ROOT_PATH", "/");
define("PNF_LIB_PATH", $_SERVER["DOCUMENT_ROOT"] . PNF_SITE_ROOT_PATH . "lib/");
define("PNF_SYSTEM_PATH", $_SERVER["DOCUMENT_ROOT"] . PNF_SITE_ROOT_PATH . "system/");
define("PNF_CONFIG_PATH", $_SERVER["DOCUMENT_ROOT"] . PNF_SITE_ROOT_PATH . "config/");
//no $_SERVER["DOCUMENT_ROOT"], simplify loader usage
define("PNF_MODULE_PATH", PNF_SITE_ROOT_PATH . "module/");
//no $_SERVER["DOCUMENT_ROOT"], simplify loader usage
define("PNF_TEMPLATE_PATH", PNF_SITE_ROOT_PATH . "template/");
define("PNF_DEFAULT_TEMPLATE", "main.php");

//add libraries autoload
require_once(PNF_SYSTEM_PATH . "autoload.php");
//add modules definition
require_once(PNF_SYSTEM_PATH . "modules.php");

//add some conf files
require_once(PNF_CONFIG_PATH . "host.php");