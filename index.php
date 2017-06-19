<?php
    session_start();

	use library\Url;

	function __autoload($className){

		$fileName = 'core/' . str_replace( '\\', '/', $className) . '.php';
		if(!file_exists($fileName)){
            throw new Exception('Class not found! ' . $fileName, '404');
		}

		require_once $fileName;
	}


	//var_dump(explode('/', $_GET['url']));
	/*echo '<pre>';
	print_r();
	echo '</pre>';*/


	//$url = \library\Url::getParam('a');
	//var_dump(\library\Url::getAllSegment());

	$controllerName = Url::getSegment(0);
	$actionName = Url::getSegment(1);

	//проверка
    //var_dump(Url::getSegmentsFromUrl());
    //var_dump($_GET);
	/*var_dump($controllerName);
	echo '<br>';
	var_dump($actionName);die();*/

	if(is_null($controllerName)){
		$controller = 'controllers\ControllerMain';
	}else{
		$controller = 'controllers\Controller'.ucfirst($controllerName);
	}

	if(is_null($actionName)){
		$action = 'actionIndex';
	}else{
		$action = 'action'.ucfirst($actionName);
	}


	try{
        $fileName = 'core/' . str_replace( '\\', '/', $controller) . '.php';
        if(!file_exists($fileName)){
            throw new \library\HttpException('Page not found: ' . $fileName);
        }
        $controller = new $controller();

		if(!method_exists($controller, $action)){
			throw new \library\HttpException('Not found');
		}

		$controller->$action();
	}catch(\library\HttpException $e){
		header("HTTP/1.1 ".$e->getCode()." ".$e->getMessage());
		//die($e->getMessage());
		die('Page not found header');
	}catch(Exception $e){
	    die($e->getMessage());
    }