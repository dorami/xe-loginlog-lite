<?php
/**
 * @class loginlogModel
 * @author 퍼니엑스이 (admin@funnyxe.com)
 * @brief loginlog 모듈의 model class
 **/

class loginlogModel extends loginlog
{
	/**
	 * @brief 초기화
	 */
	function init()
	{
	}

	/**
	 * @brief 모듈의 global 설정 구함
	 */
	function getModuleConfig()
	{
		static $config = null;
		if(is_null($config))
		{
			$oModuleModel = getModel('module');
			$config = $oModuleModel->getModuleConfig('loginlog');
			if(!$config)
			{
				$config = new stdClass;
			}

			if(!$config->admin_user_log) $config->admin_user_log = 'N';

			unset($config->body);
			unset($config->_filter);
			unset($config->error_return_url);
			unset($config->act);
			unset($config->module);
		}

		return $config;
	}

	function getLoginlogList()
	{
	}

	function getLoginlogListForAdmin()
	{
	}
}