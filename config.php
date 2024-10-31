<?php
if(!class_exists('YrmConfig')) {

	class YrmConfig {

		public function __construct() {

			$this->init();
		}

		public static function addDefine($name, $value) {
			if(!defined($name)) {
				define($name, $value);
			}
		}

		public function getDirectoryName() {

			$baseName = plugin_basename(__FILE__);
			$readMoreDirectoryName = explode('/', $baseName);

			if(isset($readMoreDirectoryName[0])) {
				return $readMoreDirectoryName[0];
			}

			return '';
		}

		private function init() {

			$readMoreDirectoryName = $this->getDirectoryName();
			self::addDefine('YRM_PLUGIN_PREFIX', $readMoreDirectoryName);
			self::addDefine('YRM_MAIN_FILE', $readMoreDirectoryName.'.php');
			self::addDefine('YRM_PATH', dirname(__FILE__).'/');
			self::addDefine('YRM_CLASSES', YRM_PATH.'classes/');
			self::addDefine('YRM_FILES', YRM_PATH.'files/');
			self::addDefine('YRM_CSS', YRM_PATH.'css/');
			self::addDefine('YRM_VIEWS', YRM_PATH.'views/');
			self::addDefine('YRM_JAVASCRIPT_PATH', YRM_PATH.'js/');
			self::addDefine('YRM_URL', plugins_url('', __FILE__).'/');
			self::addDefine('YRM_JAVASCRIPT', YRM_URL.'js/');
			self::addDefine('YRM_CSS_URL', YRM_URL.'css/');
			self::addDefine('YRM_LANG', 'yrm_lang');
			self::addDefine('YRM_VERSION', 1.07);
			self::addDefine('YRM_PRO_VERSION', 1.04);

			/*
			 * ToDo write config pkg
			 * */
			require_once(dirname(__FILE__).'/config-pkg.php');

			self::addDefine('YRM_PRO_URL', 'https://edmonsoft.com/read-more/');
		}

		public static function readMoreHeaderScript() {

			$headerScript = "YRM_VERSION=" . YRM_VERSION;
			if(YRM_PKG > 1) {
				$headerScript = "YRM_PRO_VERSION=" . YRM_PRO_VERSION;
			}

			return "<script type=\"text/javascript\">
			$headerScript
		</script>";
		}
	}

	$configInit = new YrmConfig();
}