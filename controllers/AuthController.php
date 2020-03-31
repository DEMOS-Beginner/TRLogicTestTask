<?php

	/**
	*
	* AuthController. 
	*
	*/

	require_once 'Controller.php';

	class AuthController extends Controller
	{

		/**
		* Занимается формированием страницы регистрации
		*/
		public function indexAction()
		{
			$this->loadTemplate('header');
			$this->loadTemplate('auth');
			$this->loadTemplate('footer');
		}


		/**
		* Авторизует пользователя
		*/
		public function authAction()
		{
			echo "Вы успешно авторизовались";
		}

	}