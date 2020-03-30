<div class="container">
	<div class="row justify-content-center">
		<h1>Форма авторизации</h1>			
	</div>
	<div class="row justify-content-center">
		<div class="col-md-6">
			<form action="login" method='POST'>
				<div class="form-group">
					<label for="name">Введите email</label>
					<input type="text" name='email' class='form-control' placeholder="Email">
				</div>

				<div class="form-group">
					<label for="password">Введите пароль</label>
					<input type="text" name='password' class='form-control' placeholder="Пароль">
				</div>

				<div class="form-group">
					<button type='submit' class='btn btn-success btn-block'>Войти</button>
				</div>		
			</form>
		</div>
	</div>
</div>