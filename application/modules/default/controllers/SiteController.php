<?php
/**
 * @file IndexController.php
 * @synopsis  首页
 * @author Yee, <rlk002@gmail.com>
 * @version 1.0
 * @date 2016-07-13 13:27:52
 */

class Default_SiteController extends App_Controller {

	public $flag;
	public function init() {
		parent::init();
	}

	public function helloAction() {
		$this->smarty->assign('hello', 'Hello World');
	}
}
