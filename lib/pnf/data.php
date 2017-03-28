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
	private $_err;

	/**
	 * @brief init data
	 */
	protected function _init()
	{
		$this->_param = array();
		$this->_err = array();
		$this->modules = array();
		$this->fd = array();
	}

	/**
	 * @brief get err array
	 * @param bool $clear clear after loading
	 * @return bool|string FALSE or errors array
	 */
	function getErrArr($clear = true)
	{
		$ans = FALSE;
		if (is_array($this->_err)) {
			$ans = $this->_err;
			if ($clear) {
				$this->_err = array();
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
	function getErr($fname, $clear = true)
	{
		$ans = FALSE;
		if (isset($this->_err[$fname])) {
			$ans = $this->_err[$fname];
			if ($clear) {
				unset($this->_err[$fname]);
			}
		}
		return $ans;
	}

	/**
	 * @brief set err
	 * @param string $fname name of function/error key
	 * @param string $text error code or description
	 */
	function setErr($fname, $text)
	{
		$this->_err[$fname] = $text;
	}

	/**
	 * @brief check if error and optionally return
	 * @param string $fname name of function/error key
	 * @param bool $getErr do err return
	 * @param bool $clearWhenGet do chear on returning
	 * @return bool|mixed err flag or value
	 */
	function isErr($fname, $getErr = false, $clearWhenGet = true)
	{
		$ans = false;
		if (isset($this->_err[$fname]) && !empty($this->_err[$fname])) {
			if (!$getErr) {
				$ans = true;
			} else {
				$ans = $this->getErr($fname, $clearWhenGet);
			}
		}
		return $ans;
	}

	/**
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
	 * get json from php://input stream and decode it
	 * @return mixed
	 */
	function decodeJsonFromStream()
	{
		return json_decode(file_get_contents('php://input'), true);
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