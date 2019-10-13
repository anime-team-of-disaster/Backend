<?php
$conn = mysqli_connect("localhost", "root", "");
mysql_select_db("strefa", $conn);
//search code
//error_reporting(0);
if($_REQUEST['submit']){
$TITLE = $_POST['TITLE'];
if(empty($TITLE)){
	$make = '<h4>You must type a word to search!</h4>';
}else{
	$make = '<h4>No match found!</h4>';
	$sele = "SELECT * FROM data WHERE TITLE LIKE '%$TITLE%'";
	$result = mysql_query($sele);
	
	if($mak = mysql_num_rows($result) > 0){
		while($row = mysql_fetch_assoc($result)){
		echo '<h4> ANIME_ID						: '.$row['ANIME_ID'];
		echo '<br> TITLE						: '.$row['TITLE'];
		echo '</h4>';
	}
}else{
echo'<h2> Search Result</h2>';
print ($make);
}
mysql_free_result($result);
mysql_close($conn);
}
}
?>