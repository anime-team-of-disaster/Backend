<?php 

require_once('DB.php');

$db = new DB();
$data = $db->viewData();

// var_dump($data);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <title>Live search</title>
</head>
<body>
    
<h1>Live search</h1>
<form action="search.php" method="POST">
    <input type="text" name="" placeholder="Szukaj tutaj" id="searchBox" oninput=search(this.value)>
</form>
<ul id="dataViewer">
    <?php foreach($data as $i) { ?>
    <li><?php echo $i["TITLE"]; ?></li>
    <?php } ?>
</ul>

<script src="main.js"></script>

</body>
</html>