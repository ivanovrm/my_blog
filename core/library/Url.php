<?php

	namespace library;

	class Url{

		/*private $_url;
		private $_segments;
		private $_params;

		public function __construct(){

				$this->_url = $_SERVER[REQUEST_URI];
				$this->getSegmentsFromUrl();
				$this->_params = $_GET;
				unset($this->_params['url']);
		}*/
        //protected
		protected static function getSegmentsFromUrl(){

			$segments = explode('/', $_GET['url']);

			if(empty ($segments[count($segments) - 1])){
				unset($segments[count($segments) - 1]);
			}
			//array_map() - вызывает callback функцию, которая применяется к каждому элементу в указанном массиве
			$segments = array_map(function($v){
				//регулярка - заменит все символы на пустую строку
				return preg_replace('/[\'\\\*]/','', $v);
			}, $segments);

			return $segments;
		}

		public static function getParam($paramName){
			//addslashes() - экранирует спец символы
			//urlencode() urldecode() - декодирует спецсимволы
			return addcslashes($_GET[$paramName]);
		}

		public static function getSegment($n){
			$segments = self::getSegmentsFromUrl();
			return $segments[$n];
		}

		public static function getAllSegment(){

			return self::getSegmentsFromUrl();
		}

		/*public static function getUrlString(){

			return self::$_url; 
		}*/

	}