<div class="container">
	<div class="row">
		<h1>Форма авторизации</h1>			
	</div>

	<div class="row hideme" id='authErrors'>
		<div class="col-md-6">
			<div class="alert alert-danger" role='alert'>
				<button type='button' class='close' data-dismiss='alert' aria-label='Close'
				onclick='closeMessage("#authErrors");'>
					<span aria-hidden='true'>x</span>
				</button>
				<span id='errorText'></span>
			</div>			
		</div>
	</div>

	<div class="row">
		<div class="col-md-6">
			<div id='authData'>
				<div class="form-group">
					<label for="name">Введите email</label>
					<input type="text" name='email' class='form-control' placeholder="Email">
				</div>

				<div class="form-group">
					<label for="password">Введите пароль</label>
					<input type="password" name='password' class='form-control' placeholder="Пароль">
				</div>

				<div class="form-group">
					<a onclick='login();' class='btn btn-success btn-block'>Войти</a>
				</div>		
			</div>
		</div>
	</div>
</div>