<?php

	/**
	*
	* RegisterController. 
	*
	*/

	//Подключение необходимых компонентов
	require_once 'Controller.php';
	require_once '../models/UsersModel.php';

	class RegisterController extends Controller
	{

		/**
		* Занимается формированием страницы регистрации
		*/
		public function indexAction()
		{
			$this->loadTemplate('header');
			$this->loadTemplate('register');
			$this->loadTemplate('footer');
		}


		/**
		* Регистрирует пользователя
		*/
		public function registerAction()
		{
			require_once '../requests/RegisterRequest.php';

			//Проверяет все поля на заполнение
			$request = new RegisterRequest;
			$resData = $request->checkRegisterParams();

			//Если не все поля заполнены, то вызываем ошибку.
			if (!$resData['success']) {
				echo json_encode($resData);
				return;
			}

			//Фильтруем данные, полученные с полей. Хешируем пароль.
			$resData = [];
			$userName = filter_var(trim($_POST['name']), FILTER_SANITIZE_FULL_SPECIAL_CHARS);
			$userEmail = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
			$userPassword = md5($_POST['password']);

			//Если пользователь с таким Email существует, то вызываем ошибку.
			$model = new UsersModel;
			if ($model->checkUserEmail($userEmail)) {
				$resData['success'] = 0;
				$resData['message'] = 'Пользователь с таким email уже существует';
				echo json_encode($resData);
				return;
			}

			//Если пользователь успешно зарегистрирован, то кладём его данные в сессию.
			$userData = $model->registerNewUser($userName, $userEmail, $userPassword);
			if ($userData) {
				$_SESSION['userData'] = $userData;
				$resData['success'] = 1;
				echo json_encode($resData);
			}

		}

	}