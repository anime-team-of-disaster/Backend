<?php
// zawrzeć plik config
require_once "config.php";
 
// Definicja zmiennych
$username = $password = $confirm_password = "";
$username_err = $password_err = $confirm_password_err = "";
 
// Przetwarzanie formularza
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Walidacja nazwy użytkownika
    if(empty(trim($_POST["username"]))){
        $username_err = "Podaj nazwę użytkownika.";
    } else{
        // Przygotowanie instrukcji select
        $sql = "SELECT id FROM users WHERE username = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Puste zmienne do przygotowanej instrukcji dla parametru
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Ustalenie parametru
            $param_username = trim($_POST["username"]);
            
            // Egzekwowanie parametru
            if(mysqli_stmt_execute($stmt)){
                /* zapisanie wyniku */
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $username_err = "Nazwa użytkownika jest już zajęta.";
                } else{
                    $username = trim($_POST["username"]);
                }
            } else{
                echo "Ups! Coś poszło nie tak. Spróbuj ponownie później!";
            }
        }
         
        
        mysqli_stmt_close($stmt);
    }
    
    // Walidacja hasła
    if(empty(trim($_POST["password"]))){
        $password_err = "Podaj hasło.";     
    } elseif(strlen(trim($_POST["password"])) < 6){
        $password_err = "Hasło musi składać się z przynajmniej 6 znaków.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Walidacja potwwierdzenia hasła
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Potwierdź hasło.";     
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "Hasła nie są pokrewne.";
        }
    }
    
    // sprawdzenie błędów przed przeniesieniem do bazy
    if(empty($username_err) && empty($password_err) && empty($confirm_password_err)){
        
        // Instrukcja wstawiania
        $sql = "INSERT INTO users (username, password) VALUES (?, ?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Puste zmienne do przygotowanej instrukcji dla parametru
            mysqli_stmt_bind_param($stmt, "ss", $param_username, $param_password);
            
            // Ustalenie parametru
            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Password hash
            
            // Egzekwowanie parametru
            if(mysqli_stmt_execute($stmt)){
                // Przeniesienie do strony logowania
                header("location: login.php");
            } else{
                echo "Ups! Coś poszło nie tak. Spróbuj ponownie później!";
            }
        }
         
        mysqli_stmt_close($stmt);
    }
    
    mysqli_close($link);
}
?>
 
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Rejestracja</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body{ font: 14px sans-serif; }
        .wrapper{ width: 350px; padding: 20px; }
    </style>
</head>
<body>
    <div class="wrapper">
        <h2>Rejestracja</h2>
        <p>Wypełnij formularz aby się zarejestrować.</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                <label>Nazwa użytkownika</label>
                <input type="text" name="username" class="form-control" value="<?php echo $username; ?>">
                <span class="help-block"><?php echo $username_err; ?></span>
            </div>    
            <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                <label>Hasło</label>
                <input type="password" name="password" class="form-control" value="<?php echo $password; ?>">
                <span class="help-block"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
                <label>Potwierdź hasło</label>
                <input type="password" name="confirm_password" class="form-control" value="<?php echo $confirm_password; ?>">
                <span class="help-block"><?php echo $confirm_password_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Submit">
                <input type="reset" class="btn btn-default" value="Reset">
            </div>
            <p>Masz już konto? <a href="login.php">Zaloguj się</a>.</p>
        </form>
    </div>    
</body>
</html>