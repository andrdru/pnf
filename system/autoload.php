<?php
spl_autoload_register(function ($class) {
	$class = implode(DIRECTORY_SEPARATOR, explode("\\", $class));
	if (file_exists(PNF_LIB_PATH . $class . '.php')) {
		require_once(PNF_LIB_PATH . $class . '.php');
	}
});