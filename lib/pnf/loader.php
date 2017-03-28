<?php
namespace pnf;
/**
 * Class loader
 */
class loader extends userdata
{
	/**
	 * @var loader() object var
	 */
	protected static $loader;

	/**
	 * @var string full path to views
	 */
	private $viewPath = '';

	/**
	 * loader constructor
	 */
	private function __construct()
	{
	}

	/**
	 * @brief no __clone
	 */
	private function __clone()
	{
	}

	/**
	 * @brief no __wakeup
	 */
	private function __wakeup()
	{
	}

	/**
	 * @brief get loader() instance
	 */
	public static function getInstance()
	{
		if (is_null(self::$loader)) {
			self::$loader = new loader;
			self::$loader->_init();
		}
		return self::$loader;
	}

	/**
	 * @brief set $this->modulesPath
	 *
	 * @param string $path set full path to views
	 */
	public function viewSetFullPath($path)
	{
		$this->viewPath = $_SERVER['DOCUMENT_ROOT'] . $path;
	}

	/**
	 * @brief prepare and show template
	 *
	 * - set full path to views
	 * - load template
	 *
	 * @param string $template template name
	 * @param string $templatePath path to templates catalog
	 * @param string $viewPath path to views catalog
	 * @param string $loadType switch of
	 *  - require_once
	 *  - require
	 *  - include_once
	 *  - include
	 */
	public function printPage($template = PNF_DEFAULT_TEMPLATE, $templatePath = PNF_TEMPLATE_PATH, $viewPath = PNF_MODULE_PATH, $loadType = 'require_once')
	{
		$this->viewSetFullPath($viewPath);
		$template = $_SERVER['DOCUMENT_ROOT'] . $templatePath . $template;
		ob_start();
		$this->_processLoad($template, $loadType);
		ob_end_flush();
	}

	/**
	 * @brief load from $this->module array by key
	 *
	 * @param string $key key name
	 * @param string $loadType switch of
	 *  - require_once
	 *  - require
	 *  - include_once
	 *  - include
	 * @version 1.3
	 */
	public function load($key, $loadType = 'require_once')
	{
		if (isset($this->modules[$key])) {
			$path = $this->viewPath . $this->modules[$key];
			$this->_processLoad($path, $loadType);
		}
	}

	/**
	 * @brief load file
	 *
	 * @param string $path path to load
	 * @param string $loadType switch of
	 *  - require_once
	 *  - require
	 *  - include_once
	 *  - include
	 */
	private function _processLoad($path, $loadType = 'require_once')
	{
		switch ($loadType) {
			default:
			case "require_once": {
				require_once($path);
			}
				break;
			case "require": {
				require($path);
			}
				break;
			case "include_once": {
				include_once($path);
			}
				break;
			case "include": {
				include($path);
			}
				break;
		}
	}

}