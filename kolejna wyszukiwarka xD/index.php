<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form method="post">
    <label>search</label>
    <input type="text" name="search">
    <input type="submit" name="">

    </form>
</body>
</html>

<?php 
$con = new PDO("mysql:host=localhost;dbname=strefa",'root','')

if (isset($_POST["sub"])) {
    $str = $_POST["search"];
    $sth = $con->prepare("SELECT * FROM `search` WHERE Name = '$str'");

    $sth->setFetchMode(PDO:: FETCH_OBJ);
    $sth -> execute();

    if($row = $sth->fetch())
    {
        ?>
        <br><br><br>
        <table>
            <tr>
                <th>Name</th>
                <th>Description</th>
            </tr>
            <tr>
                <td><?php echo $row->Name; ?></td>
                <td><?php echo $row->Description; ?></td>
            </tr>
        </table>
        <?php
    }
    else{
        echo "Nie ma Anime o podanej nazwie";
    }


}

?>