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
		public function registerNewUser($userName, $userEmail, $userPassword, $aboutUser)
		{
			//Вставляем данные пользователя в таблицу пользователей
			$sql = 'INSERT INTO users (name, email, password, about) VALUES (:name, :email, :password, :about)';
			$query = $this->db->prepare($sql);
			$result = $query->execute([
				'name'     => $userName,
				'email'    => $userEmail,
				'password' => $userPassword,
				'about'    => $aboutUser,
			]);

			//Если пользователь успешно зарегистрировался, то сразу логиним его
			if ($result) {
				$userData = $this->loginUser($userEmail, $userPassword);
				return $userData;
			} 

			return $result;
		}


		/**
		* Находит в базе данных пользователя с указанным паролем и email
		* @param string $email
		* @param string $password
		* @return array $userData
		*/
		public function loginUser($email, $password)
		{
			$sql = 'SELECT * FROM users WHERE email = :email AND password = :password LIMIT 1';
			$query = $this->db->prepare($sql);
			$query->execute([
				'email'    => $email,
				'password' => $password,
			]);
			$userData = $query->fetch();

			return $userData;
		}
	}