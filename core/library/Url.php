<?php

	namespace library;

	class Url{

		private $_url;
		private $_segments;
		private $_params;

		public function __construct(){

				$this->_url = $_SERVER[REQUEST_URI];
				$this->getSegmentsFromUrl();
				$this->_params = $_GET;
				unset($this->_params['url']);
		}

		protected  function getSegmentsFromUrl(){

			$segments = explode('/', $_GET['url']);

			if(empty ($segments[count($segments) - 1])){
				unset($segments[count($segments) - 1]);
			}

			$this->_segments = $segments;
		}

		public static function getParam($paramName){

			return $_GET[$paramName];
		}

		public static function getSegment($n){

			return $this->_segment[$n];
		}

		public static function getAllSegment(){

			return $this->_segments;
		}

		public static function getUrlString(){

			return self::$_url; 
		}

	}