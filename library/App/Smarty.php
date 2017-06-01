<?php
/**
 * @file Smarty.php
 * @synopsis
 * @author Yee, <rlk002@gmail.com>
 * @version 1.0
 * @date 2016-07-12 17:32:18
 */

class Zsmarty extends \Smarty {
	public function __construct($template_dir = ROOT_PATH) {

		parent::__construct();
		$this->template_dir = $template_dir . '/views/templates/';
		$this->compile_dir = $template_dir . '/views/templates_c/';
		$this->cache_dir = $template_dir . '/views/cache/';
		$this->left_delimiter = '<{';
		$this->right_delimiter = '}>';
		$this->force_compile = True;
		$this->caching = False;
		$this->compile_check = True;
		$this->config($this);
	}

	public function config($smarty_obj) {
		$smarty_obj->assign('date_format', '%Y-%m-%d %H:%M:%S');
		$smarty_obj->assign('date_format_ymd_hm', '%Y-%m-%d %H:%M');
		$smarty_obj->assign('date_format_md_hm', '%m-%d %H:%M');
		$smarty_obj->assign('date_format_yymd_hm', '%y-%m-%d %H:%M');
		$smarty_obj->assign('date_format_ymd', '%Y-%m-%d');
		$smarty_obj->assign('date_format_ym', '%Y-%m');
	}
}
