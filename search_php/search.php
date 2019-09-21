<?php 
    include 'header.php';
?>


<h1>Search page</h1>

<div class="article-container">
<?php
    if (isset($_POST['submit-search'])) {
        $search = mysqli_real_escape_string($conn, $_POST['search']);
        $sql = "SELECT * FROM article WHERE a_title LIKE '%$search%' OR a_text LIKE '%$search%' OR a_author LIKE '%$search%' OR a_date LIKE '%$search%'";
        $resault = mysqli_query($conn, $sql);
        $queryResault = mysqli_num_rows($resault);

        if ($queryResault > 0 ) {
            while ($row = mysqli_fetch_assoc($resault)){
                echo "<div class='article-box'>
                    <h3>".$row['a_title']."</h3>
                    <p>".$row['a_text']."</p>
                    <p>".$row['a_date']."</p>
                    <p>".$row['a_author']."</p>
                    </div>";

            }
        } else {
            echo "Nie ma wyników dla podanej frazy!";
        }
    }
?>
</div>