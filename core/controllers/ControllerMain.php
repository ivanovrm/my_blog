<?php

	namespace controllers;
	
	use base\Controller;
    use library\Auth;
    use library\Db;
    use library\HttpException;
    use models\LoginForm;
    use library\Request;

    class ControllerMain extends Controller{
        public function actionIndex(){

           // $db = Db::getDb();
            //var_dump($db);
            //$res = $db->sendQuery("SELECT * FROM post");

            echo 'index page';
        }

        public function actionLogin(){
            if(Auth::isGuest()){
                $model = new LoginForm();
                if(Request::isPost()){
                    if($model->load(Request::getPost()) and $model->validate()){
                        if($model->doLogin()){
                            header("Location: /oop");
                        }
                    }
                }
                $this->_view->setTitle('Login');
                $this->_view->render('login', ['model' => $model]);
            }else{
                throw new HttpException('Forbidden', '403');
            }
        }

        public function actionLogout()
        {

       }

        public function actionRegister()
        {

       }

	}

