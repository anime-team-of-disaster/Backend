<?php
$connect = mysqli_connect("localhost", "root", "", "strefa");
$output = '';
if(isset($_POST["query"]))
{
	$search = mysqli_real_escape_string($connect, $_POST["query"]);
	$query = "
	SELECT * FROM anime
	WHERE TITLE LIKE '%".$search."%'
	
    ";
    
    // OR Address LIKE '%".$search."%' 
	// OR City LIKE '%".$search."%' 
	// OR PostalCode LIKE '%".$search."%' 
	// OR Country LIKE '%".$search."%'
}
else
{
	$query = "
	SELECT * FROM anime ORDER BY TITLE LIMIT 0,3";
}
$result = mysqli_query($connect, $query);

// if(isset)
if(mysqli_num_rows($result) > 0)
{
	// $output .= '<div class="table-responsive">
	// 				<table class="table table bordered">
	// 					<tr>
	// 						<th>TITLE</th>
	// 						<th>CREATOR</th>
	// 						<th>TYPE</th>
	// 						<th>RATING</th>
	// 						<th>EPISODES</th>
	// 					</tr>';

	// $counter = 0;
	// $max = 2;
	while($row = mysqli_fetch_array($result) )
	{
		$output .= '
			
				<div class="results__item"><a href="../'.$row["TITLE"].'/index.php" class="results__item--link"><div class="results__item--img"></div>'.$row["TITLE"].'</a></div>
				
			
		';
	}
	// $row++;
	echo $output;
}
else
{
	echo 'Data Not Found';
}
?>