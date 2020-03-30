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
		* Занимается формированием главной страницы
		*/
		public function indexAction()
		{
			$this->loadTemplate('header');
			$this->loadTemplate('auth');
			$this->loadTemplate('footer');
		}

		/**
		* Логинит пользователя
		*/
		public function loginAction() {
			echo "Вы успешно залогинились";
		}

	}