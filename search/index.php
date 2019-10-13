<!DOCTYPE html>
<html>
<head>
</head>
<body>
    
    <form method="post">
    <label >search engine</label>
    <input type="text" name="search">
    <input type="submit" name="submit">
    </form>
</body>
</html>

<?php

$con = new PDO("mysql:host=localhost;dbname=search",'root','');

if (isset($_POST["submit"])) {
    $str = $_POST["search"];
    $sth = $con->prepare("SELECT * FROM `search` WHERE name = '$str'");

    $sth->setFetchMode(PDO:: FETCH_OBJ);
    $sth -> execute();

    if ($row = $sth->fetch()) 
    {
        ?>
        <br><br><br>
        
        <table>
            <tr>
                <th>name</th>
                <th>descrition</th>
            </tr>
            <tr>
                <td><?php echo $row-> name; ?></td>
                <td><?php echo $row-> description; ?></td>
            </tr>
        </table>
<?php        
    }
        
        else {
             echo "Name does not exist";
        }


}
?>