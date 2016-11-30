here's module with submodule<br>
<?php
$loader = \pnf\loader::getInstance();

//define submodule into module
$loader->modules["sub"]="demo/subitem.php";
$loader->load("sub");