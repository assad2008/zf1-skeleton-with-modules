<?php
/**
 * @file Bootstrap.php
 * @synopsis  Bootstrap
 * @author Yee, <rlk002@gmail.com>
 * @version 1.0
 * @date 2016-07-12 18:59:47
 */

require_once 'App/Bootstrap/Abstract.php';

class Bootstrap extends App_Bootstrap_Abstract
{
    protected $_first = [
        'Autoloader',
        'Environment',
    ];

    protected $_last = [
        'AppPaths',
    ];

    protected function _initAutoloader()
    {
        $loader = Zend_Loader_Autoloader::getInstance();
        $loader->registerNamespace('App_');
        $loader->registerNamespace('Zend_');
        $loader->setFallbackAutoloader(true);
    }

    protected function _initEnvironment()
    {
        $file = APPLICATION_PATH . '/configs/environment.php';
        if (!is_readable($file)) {
            throw new Zend_Exception('Cannot find the environment.php file!');
        }

        require_once $file;
        if (!defined('APPLICATION_ENV')) {
            throw new Zend_Exception('The APPLICATION_ENV constant is not defined in ' . $file);
        }

        Zend_Registry::set('IS_PRODUCTION', APPLICATION_ENV == APP_STATE_PRODUCTION);
        Zend_Registry::set('IS_DEVELOPMENT', APPLICATION_ENV == APP_STATE_DEVELOPMENT);
        Zend_Registry::set('IS_STAGING', APPLICATION_ENV == APP_STATE_STAGING);
    }

    protected function _initAppVersion()
    {
        $configuration = App_DI_Container::get('ConfigObject');
        if (isset($configuration->release->version)) {
            define('APP_VERSION', $configuration->release->version);
        } else {
            define('APP_VERSION', 'unknown');
        }
        Zend_Registry::set('APP_VERSION', APP_VERSION);
    }

    protected function _initAppPaths()
    {
        $paths = [
            APPLICATION_PATH,
            get_include_path(),
        ];
        set_include_path(implode(PATH_SEPARATOR, $paths));
    }

    protected function _initDb()
    {
        $config = App_DI_Container::get('ConfigObject');
        $dbAdapter = Zend_Db::factory($config->resources->db);
        $dbAdapter->setFetchMode(Zend_Db::FETCH_OBJ);
        Zend_Db_Table_Abstract::setDefaultAdapter($dbAdapter);
        Zend_Registry::set('db', $dbAdapter);
        Zend_Db_Table_Abstract::setDefaultMetadataCache(App_DI_Container::get('CacheManager')->getCache('default'));
    }

    public function _initCache()
    {
        mb_internal_encoding("UTF-8");
        $frontend = array('lifetime' => 7200, 'automatic_serialization' => true);
        $cachedir = realpath(ROOT_PATH . '/data/cache');
        $backend = array('cache_dir' => $cachedir);
        $cache = Zend_Cache::factory('Core', 'File', $frontend, $backend);
        Zend_Db_Table_Abstract::setDefaultMetadataCache($cache);
        Zend_Registry::set('cache', $cache);
        Zend_Locale::setCache($cache);
    }

    protected function _initSession()
    {
        Zend_Session::start();
        $session = new Zend_Session_Namespace();
        $session->lang = isset($session->lang) ? $session->lang : "zh_CN";
        Zend_Registry::set('session', $session);
    }

    public function runApp()
    {
        $front = Zend_Controller_Front::getInstance();
        $front->addModuleDirectory(APPLICATION_PATH . "/modules/");
        $front->setdefaultModule("default");
        $front->setdefaultControllerName('index');
        $front->setdefaultAction("index");
        $front->setParam('prefixDefaultModule', true);
        $front->setParam('useDefaultControllerAlways', false);
        $front->setParam('noViewRenderer', true);
        $front->dispatch();
    }
}
