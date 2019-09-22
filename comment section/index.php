<?php
    date_default_timezone_set('Europe/Warsaw');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Comment System</title>
    
</head>
<body>

<video width="320" height="240" controls>
    <source src="movie.mp4" type="video/mp4">
    <source src="movie.ogg" type="video/ogg">
</video>

<?php 
echo"<form>
    <input type='hidden' name='uid' value='Anonymous'>
    <input type='hidden' name='date' value='".date(Y-m-d H:i:s)."'>
    <textarea name='message'></textarea>
    <button type='submit' name='submit'>Comment</button>
    </form>";
?>

</body>
</html>