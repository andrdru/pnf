<?php
namespace pnf;
/**
 * Class data
 */
abstract class data
{
	/**
	 * @var array() modules
	 */
	public $modules;
	/**
	 * @var array() seo parameters
	 */
	public $seo;
	/**
	 * @var array() Form Data
	 */
	public $fd;
	/**
	 * @var array() method params for __set() and __get()
	 */
	private $_param;
	/**
	 * @var array() current error
	 */
	private $err;

	/**
	 * @brief init data
	 */
	protected function _init()
	{
		$this->_param = array();
		$this->fd = array();
		$this->err = array();
		$this->modules = array();
		$this->seo = array(
			"keywords" => "",
			"description" => "",
			"title" => ""
		);
	}

	/**
	 * @brief get err array
	 * @param bool $clear clear after loading
	 * @return bool|string FALSE or errors array
	 */
	function _getErrArr($clear = true)
	{
		$ans = FALSE;
		if (is_array($this->err)) {
			$ans = $this->err;
			if ($clear) {
				$this->err = array();
			}
		}
		return $ans;
	}

	/**
	 * @brief get err
	 * @param string $fname name of function/error key
	 * @param bool $clear clear after loading
	 * @return bool|string FALSE or error description
	 */
	function _getErr($fname, $clear = true)
	{
		$ans = FALSE;
		if (isset($this->err[$fname])) {
			$ans = $this->err[$fname];
			if ($clear) {
				unset($this->err[$fname]);
			}
		}
		return $ans;
	}

	/**
	 * @brief set err
	 * @param string $fname name of function/error key
	 * @param string $text error code or description
	 */
	function _setErr($fname, $text)
	{
		$this->err[$fname] = $text;
	}

	/***
	 * @brief load data from raw array to $this->fd array
	 *
	 * @param array $arr array to load
	 * @param string $exceptStr exception keys, delimited by comma
	 * @param boolean $reverse reverse exception, use only $exceptStr keys in result
	 * @param boolean $clear clear $this->fd array
	 * @version 1.1
	 */
	function loadToFD($arr, $exceptStr = "", $reverse = FALSE, $clear = true)
	{
		if ($clear) {
			$this->fd = array();
		}

		if (isset($arr) && is_array($arr)) {
			$except = explode(",", $exceptStr);
			$keys = array_keys($arr);
			$i = 0;
			foreach ($arr as $el) {
				if (is_array($except)) {
					if (in_array($keys[$i], $except) XOR $reverse) {
						$i++;
						continue;
					}
				}
				$this->fd[$keys[$i]] = $el;
				$i++;
			}
		}
	}

	/**
	 * @param string $name some param name to set
	 * @param $value
	 */
	function __set($name, $value)
	{
		$this->_param[$name] = $value;
	}

	/**
	 * @param string $name some param name to get
	 * @return bool
	 */
	function __get($name)
	{
		$ans = FALSE;
		if (isset($this->_param[$name])) {
			$ans = $this->_param[$name];
		}
		return $ans;
	}
}