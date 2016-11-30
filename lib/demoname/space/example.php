<?php
namespace demoname\space;
class example{
	/**
	 * @brief raise error message
	 * @return bool
	 */
	function errRaise()
	{
		$loader = \pnf\loader::getInstance();
		$loader->_setErr(__FUNCTION__, "here's another error");
		return FALSE;
	}

	/**
	 * @brief raise err
	 * if $param > 0, do not raise error
	 * if $param = 0 error is "zero"
	 * if $param < 0 error is "less then zero"
	 *
	 * @param $param
	 * @return bool
	 */
	function someUserFunc($param)
	{
		echo "process ".__FUNCTION__." with <b>$param</b><br/>";
		$loader = \pnf\loader::getInstance();
		$ans = FALSE;
		if ($param > 0) {
			$ans = TRUE;
		}
		if ($param < 0) {
			$loader->_setErr(__FUNCTION__, "less then zero");
		}
		if ($param == 0) {
			$loader->_setErr(__FUNCTION__, "zero");
		}
		return $ans;
	}
}