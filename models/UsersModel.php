<?php

	/**
	*
	* Модель для обращения к таблице пользователей
	*
	*/

	class UsersModel
	{

		/**
		* Соединение с базой данных
		*/
		protected $db;


		/**
		* Конструктор модели
		*/
		public function __construct()
		{
			$this->db = $GLOBALS['db'];
		}


		/**
		* Проверяет не зарегистрирован ли уже пользователь с таким email
		* @param string $email
		* @return int
		*/
		public function checkUserEmail($email)
		{ 
			//Получаем id пользователя с таким email
			$sql = 'SELECT id FROM users WHERE email = :email';
			$query = $this->db->prepare($sql);
			$query->execute(['email' => $email]);

			$result = $query->fetch();

			return $result;
		}


		/**
		* Заносит данные пользователя в базу данных
		* @param string $userName
		* @param string $userEmail
		* @param string $userPassword
		* @return array $userData
		*/
		public function registerNewUser($userName, $userEmail, $userPassword)
		{
			//Вставляем данные пользователя в таблицу пользователей
			$sql = 'INSERT INTO users (name, email, password) VALUES (:name, :email, :password)';
			$query = $this->db->prepare($sql);
			$result = $query->execute([
				'name'     => $userName,
				'email'    => $userEmail,
				'password' => $userPassword,
			]);

			//Если пользователь зарегистрирован, то возвращаем его данные, чтобы поместить их в сессию
			if ($result) {
				$sql = 'SELECT * FROM users WHERE email = :email AND password = :password LIMIT 1';
				$query = $this->db->prepare($sql);
				$userData = $query->execute([
					'email'    => $userEmail,
					'password' => $userPassword,
				]);			

				return $userData;
			} 

			return $result;
		}


	}