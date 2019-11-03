<?php
$connect = mysqli_connect("localhost", "root", "", "strefa");
$output = '';
if(isset($_POST["query"]))
{
	$search = mysqli_real_escape_string($connect, $_POST["query"]);
	$query = "
	SELECT * FROM user_list
	WHERE ANIME LIKE '%".$search."%'
	
    ";
    
    // OR Address LIKE '%".$search."%' 
	// OR City LIKE '%".$search."%' 
	// OR PostalCode LIKE '%".$search."%' 
	// OR Country LIKE '%".$search."%'
}
else
{
	$query = "
	SELECT * FROM user_list ORDER BY USER_NAME";
}
$result = mysqli_query($connect, $query);

// if(isset)
if(mysqli_num_rows($result) > 0)
{
	$output .= '<div class="table-responsive">
					<table class="table table bordered">
						<tr>
							<th>ANIME</th>
							<th>USER</th>
							<th>PASSWORD</th>
							<th>STATUS</th>
							<th>RATING</th>
						</tr>';
	while($row = mysqli_fetch_array($result))
	{
		$output .= '
			<tr>
				<td>'.$row["ANIME"].'</td>
				<td>'.$row["USER_NAME"].'</td>
				<td>'.$row["PASSWORD"].'</td>
				<td>'.$row["STATUS"].'</td>
				<td>'.$row["RATING"].'</td>
			</tr>
		';
	}
	echo $output;
}
else
{
	echo 'Data Not Found';
}
?>