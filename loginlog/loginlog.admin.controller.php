<?php
/**
 * @class loginlogAdminController
 * @author 퍼니엑스이 (admin@funnyxe.com)
 * @brief loginlog 모듈의 admin controller class
 **/

class loginlogAdminController extends loginlog {
	/**
	 * @brief 초기화
	 */
	function init() {
	}

	/**
	 * @brief 설정 저장
	 */
	function procLoginlogAdminInsertConfig()
	{
		$oLoginlogModel = getModel('loginlog');
		$config = $oLoginlogModel->getModuleConfig();

		$config = Context::gets('delete_logs', 'admin_user_log');
		if(!$config->delete_logs) $config->delete_logs = 'N';
		if(!$config->admin_user_log) $config->admin_user_log = 'N';

		$oModuleController = getController('module');
		$oModuleController->insertModuleConfig('loginlog', $config);

		$this->setMessage('success_saved');
	}

	/**
	 * @brief 설정 저장
	 */
	function procLoginlogAdminSaveListSetting()
	{
		$oLoginlogModel = getModel('loginlog');
		$config = $oLoginlogModel->getModuleConfig();

		$config->listSetting = explode('|@|', Context::get('listsetting'));

		$oModuleController = getController('module');
		$oModuleController->insertModuleConfig('loginlog', $config);

		$this->setMessage('success_saved');
	}

	/**
	 * @brief 기록 초기화
	 */
	function procLoginlogAdminInitLogs()
	{
		$args = new stdClass;

		if(Context::get('expire_date'))
		{
			$args->expire_date = Context::get('expire_date');
		}

		$msg_code = 'success_reset';

		$output = executeQuery('loginlog.initLoginlogs', $args);
		if(!$output->toBool()) $msg_code = 'msg_failed_reset_logs';

		$this->setMessage($msg_code);
	}
}