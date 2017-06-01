<?php
/**
 * @file Controller.php
 * @synopsis  顶级控制器
 * @author Yee, <rlk002@gmail.com>
 * @version 1.0
 * @date 2016-07-12 20:21:56
 */

abstract class App_Controller extends Zend_Controller_Action {

	public $smarty;
	public $controllerName;
	public $actionName;
	public $moduleName;

	public function init() {
		parent::init();
		$this->controllerName = $this->getRequest()->getControllerName();
		$this->actionName = $this->getRequest()->getActionName();
		$this->moduleName = $this->getRequest()->getModuleName();
		$this->_initsmarty();
	}

	protected function _initsmarty() {
		require_once "App/Smarty.php";
		$template_dir = APPLICATION_PATH . '/modules/' . $this->moduleName;
		$this->smarty = new Zsmarty($template_dir);
	}

	public function preDispatch() {
		parent::preDispatch();
		Zend_Registry::set('controllerName', $this->controllerName);
		Zend_Registry::set('actionName', $this->actionName);
		Zend_Registry::set('moduleName', $this->moduleName);
		$this->_checkAccess();
	}

	protected function _checkAccess() {
		/**
		 * check access
		 */
	}

	public function postDispatch() {
		parent::postDispatch();
		try
		{
			$template_path = $this->controllerName . '_' . $this->actionName . '.html';
			$this->smarty->display($template_path);
		} catch (Exception $e) {
			require_once 'Zend/Log/Exception.php';
			throw new Zend_Log_Exception($e->getMessage());
		}
	}
}
