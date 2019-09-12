<?php 
require_once 'controllers/authController.php'; 

if (!isset($_SESSION['id'])) {
    header('location: login.php');
    exit();
}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Strona Startowa</title>
		<link rel="stylesheet" type="text/css" href="style.css" />
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	</head>
	<body>

	<div class="container">
		<div class="row">
			<div class="col-md-4 offset-md-4 form-div login">

            <?php if(isset($_SESSION['message'])): ?>
                <div class="alert <?php echo $_SESSION['alert-class'];  ?>"></div>

                <?php
                 echo $_SESSION['message']; 
                 unset($_SESSION['message']);
                 unset($_SESSION['alert-class']);
                ?>
            </div>
            <?php endif; ?>

            <h3>Witaj!, <?php echo $_SESSION['username'];  ?></h3>
            <a href="index.php?logout=1"class="logout">Wyloguj się</a>


            <?php if(!$_SESSION['verified']): ?>
                <div class="alert alert-warning">
                    Na twój adres Email został wysłany link
                    Potwierdzający!
                    <strong><?php echo $_SESSION['email'];  ?></strong>
                </div>
            <?php endif; ?>

            <?php if($_SESSION['verified']): ?>
                <button class="btn btn-block btn-lg btn-primary">Zostałeś zweryfikowany :)</button>
            <?php endif; ?>
		</div>
	</div>

	</body>
</html>
