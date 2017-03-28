<?php
namespace pnf;
/**
* Class userdata
 *
 * This is user-defined data,like
*/
abstract class userdata extends data{

	/**
	 * @var array() seo parameters
	 */
	public $seo;

	/**
	 * @brief init data
	 */
	protected function _init()
	{
		parent::_init();
		$this->seo = array(
			"keywords" => "",
			"description" => "",
			"title" => ""
		);
	}

}