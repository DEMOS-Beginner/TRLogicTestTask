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

			if (!$about) {
				$result['message'] =  YOURSELF_INFORMATION;
			}

			//Этот код можно улучшить
			if (strlen($password) < 6) {
				$result['message'] = PASSWORD_MIN_LENGTH;
			}

			if ($password !== $password2) {
				$result['message'] =  PASSWORD_MISMATCH;				
			}

			if (!$password2) {
				$result['message'] =  ENTER_REPEAT_PASSWORD;
			}

			if (!$password) {
				$result['message'] =  ENTER_PASSWORD;
			}

			if (!$email) {
				$result['message'] =  ENTER_EMAIL;
			}

			if (!$name) {
				$result['message'] = ENTER_NAME;
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