<?php
// Zainicjuj sesję
session_start();
 
// Sprawdź, czy użytkownik jest już zalogowany, jeśli tak, przekieruj go na stronę powitalną
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: welcome.php");
    exit;
}
 
// Zainicjuj plik config
require_once "config.php";
 
// Definicja zmiennych
$username = $password = "";
$username_err = $password_err = "";
 
// Przetwarzanie formularza
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Sprawdź jeśli użytkownik jest pusty
    if(empty(trim($_POST["username"]))){
        $username_err = "Wprowadź nazwę użytkownika.";
    } else{
        $username = trim($_POST["username"]);
    }
    
    // Sprawdź jeśli hasło jest puste
    if(empty(trim($_POST["password"]))){
        $password_err = "Wprowadź hasło.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // walidacja list uwierzytelniających
    if(empty($username_err) && empty($password_err)){
        // Przygotowanie Select
        $sql = "SELECT id, username, password FROM users WHERE username = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Puste zmienne do przygotowanej instrukcji dla parametru
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Ustalenie parametru
            $param_username = $username;
            
            // Egzekwowanie parametru
            if(mysqli_stmt_execute($stmt)){
                // Store result
                mysqli_stmt_store_result($stmt);
                
                // Sprawdź czy użytkownik istnieje tak sprawdź hasło
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                    // Ustal wynik zmiennych
                    mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($password, $hashed_password)){
                            // Jeśli hasło jest prawidłowe uruchom sesje
                            session_start();
                            
                            // przechowywanie w zmiennej session
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $username;                            
                            
                            // Redirect user to welcome page
                            header("location: welcome.php");
                        } else{
                            // Wyświetl jeśli hasło się nie zgadza
                            $password_err = "Hasło które podałeś jest nieprawidłowe.";
                        }
                    }
                } else{
                    // Wyświetl jeśli taki użytkownik nie istnieje
                    $username_err = "Nie znaleziono użytkownika z taką nazwą użytkownika.";
                }
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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Logowanie</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body{ font: 14px sans-serif; }
        .wrapper{ width: 350px; padding: 20px; }
    </style>
</head>
<body>
    <div class="wrapper">
        <h2>Logowanie</h2>
        <p>Wprowadź swoje dane .</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                <label>Nazwa użytkownika</label>
                <input type="text" name="username" class="form-control" value="<?php echo $username; ?>">
                <span class="help-block"><?php echo $username_err; ?></span>
            </div>    
            <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                <label>Hasło</label>
                <input type="password" name="password" class="form-control">
                <span class="help-block"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Login">
            </div>
            <p>Nie masz konta? <a href="register.php">Załóż je teraz</a>.</p>
        </form>
    </div>    
</body>
</html>