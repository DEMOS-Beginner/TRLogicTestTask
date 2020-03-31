<?php
	
	/**
	*
	* Request для RegisterController@register
	*
	*/

	require_once 'Request.php';

	class RegisterRequest extends Request
	{

		/**
		* Проверяет регистрационные поля на заполненность
		*/
		public function checkParams()
		{
			$result = [];
			extract($_POST); //Распаковываем для удобства

			//Этот код можно улучшить
			if (strlen($password) < 6) {
				$result['message'] = "Длина пароля должна быть больше 6 символов";
			}

			if ($password !== $password2) {
				$result['message'] =  "Пароли не совпадают";				
			}

			if (!$password2) {
				$result['message'] =  "Введите повтор пароля";
			}

			if (!$password) {
				$result['message'] =  "Введите пароль";
			}

			if (!$email) {
				$result['message'] =  "Введите Email";
			}

			if (!$name) {
				$result['message'] =  "Введите ФИО";
			}

			//Если возникла какая-то проблема, значит не все данные заполнены.
			if ($result['message']) {
				$result['success'] = 0;
				return $result;
			}

			//Если проблем не возникло, значит всё хорошо.
			$result['success'] = 1;
			return $result;
		}


	}