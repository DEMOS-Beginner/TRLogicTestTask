<?php
	
	/**
	*
	* Request для AuthController@auth
	*
	*/

	require_once 'Request.php';

	class AuthRequest extends Request
	{

		/**
		* Проверяет поля авторизации на заполненность
		* @return array
		*/
		public function checkParams()
		{
			$result = [];
			extract($_POST); //Распаковываем для удобства

			if (!$password) {
				$result['message'] =  ENTER_PASSWORD;
			}

			if (!$email) {
				$result['message'] =  ENTER_EMAIL;
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