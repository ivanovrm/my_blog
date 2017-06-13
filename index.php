<?php

	function __autoload($className){

		$fileName = 'core/' . str_replace( '\\', '/', $className) . '.php';
		//if(file_exists($fileName)){
			//echo $fileName;die;
			require_once $fileName;
		//}else{
			//throw new Exception('Classs not found'); 1 способ потом отлавливать
			//die(); 2 способ 
		//}
	}


	//var_dump(explode('/', $_GET['url']));
	/*echo '<pre>';
	print_r();
	echo '</pre>';*/


	$url = \library\Url::getParam('a');
	echo $url;