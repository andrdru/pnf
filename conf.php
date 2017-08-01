<?php
require_once($_SERVER["DOCUMENT_ROOT"] . "/vendor/autoload.php");

error_reporting(E_ALL);
ini_set('display_errors', 'on');

//site config
define("PNF_SITE_ROOT_PATH", "/");
define("PNF_CONFIG_PATH", $_SERVER["DOCUMENT_ROOT"] . PNF_SITE_ROOT_PATH . "config/");

//module config
define("PNF_MODULE_PATH", PNF_SITE_ROOT_PATH . "module/");

//template config
define("PNF_TEMPLATE_PATH", PNF_SITE_ROOT_PATH . "template/");
define("PNF_DEFAULT_TEMPLATE", "main.php");

//add some conf files
require_once(PNF_CONFIG_PATH . "modules.php");

require_once(PNF_CONFIG_PATH . "host.php");
