<?php
//lib example() from namespace demoname\space automatically loads
$err = new demoname\space\example();

$err->errRaise();

$loader = \pnf\loader::getInstance();

if ($err->someUserFunc(1) && !$loader->getErr('someUserFunc')) {
	echo "OK<br/>";
}

if (!$err->someUserFunc(0)) {
	echo "NOT OK<br/>";

	echo "error arr is<br/>";
	var_dump($loader->getErrArr(false));
	echo "<br/>";

	echo "error says <b>" . $loader->getErr('someUserFunc') . "</b><br/>";

	echo "error arr after reading err<br/>";
	var_dump($loader->getErrArr(false));
	echo "<br/>";

}

if (!$err->someUserFunc(-1)) {
	echo "NOT OK<br/>";

	echo "error says <b>" . $loader->getErr('someUserFunc') . "</b><br>";
}