<?php

	/**
	*
	* IndexController. 
	*
	*/

	require_once 'Controller.php';

	class IndexController extends Controller
	{

		/**
		* Занимается формированием главной страницы
		*/
		public function indexAction()
		{
			$this->loadTemplate('header');
			$this->loadTemplate('index');
			$this->loadTemplate('footer');
		}
	}