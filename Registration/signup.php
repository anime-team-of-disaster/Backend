<?php require_once 'controllers/authController.php'; ?>
<!DOCTYPE html>
<html>
	<head>
		<title>Rejestracja użytkownika</title>
		<link rel="stylesheet" type="text/css" href="style.css" />
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	</head>
	<body>

	<div class="container">
		<div class="row">
			<div class="col-md-4 offset-md-4 form-div">
				<form action="signup.php" method="post">
				<h3 class="text-center">Rejestracja</h3>

				<?php if(count($errors) > 0 ): ?>
				<div class="alert alert-danger">
				<?php foreach($errors as $error): ?>
				<li><?php echo $error; ?></li>
				<?php endforeach; ?>
				</div>
				<?php endif; ?>



				<div class="form-group">
					<label for="username">Nazwa użytkownika</label>
					<input type="text" name="username" value="<?php echo $username; ?>" class="form-control form-control-lg">
				</div>

				<div class="form-group">
					<label for="email">Email</label>
					<input type="email" name="email" value="<?php echo $email; ?>" class="form-control form-control-lg">
				</div>

				<div class="form-group">
					<label for="Password">Hasło</label>
					<input type="Password" name="Password" class="form-control form-control-lg">
				</div>

				<div class="form-group">
					<label for="Password_2">Powtórz Hasło</label>
					<input type="Password_2" name="Password_2" class="form-control form-control-lg">
				</div>

				<div class="form-group">
				<button type="submit" name="signup-btn" class="btn btn-primary btn-block btn-lg">Zarejestruj się!</button>
				</div>
				<p class="text-center">Zarejestrowany? <a href="login.php">Zaloguj się.</a></p>

				</form>
			</div>
		</div>
	</div>

	</body>
</html>
