<form name='f1' method='POST'>
<input type='text' name='el1'><br/>
<input type='submit'>
</form>
<?php
$loader = pnf\loader::getInstance();

if(isset($_POST['el1']))
{
	$loader->loadToFD($_POST);
	$fd = &$loader->fd;
	var_dump($fd);
}