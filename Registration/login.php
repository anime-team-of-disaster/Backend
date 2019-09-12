<!DOCTYPE html>
<html>
	<head>
		<title>Logowanie</title>
		<link rel="stylesheet" type="text/css" href="style.css" />
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	</head>
	<body>

	<div class="container">
		<div class="row">
			<div class="col-md-4 offset-md-4 form-div login">
				<form action="login.php" method="post">
                <h3 class="text-center">Logowanie</h3>
                
				<!-- <div class="alert alert-danger">
					<li>Nazwa użytkownika jest wymagana!</li>
				</div> -->

				<div class="form-group">
					<label for="username">Nazwa użytkownika Lub Email</label>
					<input type="text" name="username" class="form-control form-control-lg">
				</div>

				<div class="form-group">
					<label for="Password">Hasło</label>
					<input type="Password" name="Password" class="form-control form-control-lg">
				</div>

				<div class="form-group">
				<button type="submit" name="login-btn" class="btn btn-primary btn-block btn-lg">Zaloguj się!</button>
				</div>
				<p class="text-center">Nie jesteś zarejestrowany? <a href="signup.php">Zarejestruj się!</a></p>

				</form>
			</div>
		</div>
	</div>

	</body>
</html>
