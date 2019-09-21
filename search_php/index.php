<?php 
    include 'header.php';
?>
<form action="search.php" method="POST">
<input type="text" name="search" placeholder="Search">
<button type="submit" name="submit-search">Szukaj</button>
</form>

<h1>Front Page</h1>
<h2>all articles:</h2>

<div class="article-container">
    <?php
        $sql = "SELECT * FROM article";
        $resault = mysqli_query($conn, $sql);
        $queryResault = mysqli_num_rows($resault);

        if ($queryResault > 0) {
            while ($row = mysqli_fetch_assoc($resault)){
                echo "<div class='article-box'>
                    <h3>".$row['a_title']."</h3>
                    <p>".$row['a_text']."</p>
                    <p>".$row['a_date']."</p>
                    <p>".$row['a_author']."</p>

                </div>";

            }
        }
    ?>
</div>

</body>
</html>