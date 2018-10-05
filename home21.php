<!doctype html>
<link href="../css/singlePageTemplate.css" rel="stylesheet" type="text/css" /> 
<?php
session_start();
$_SESSION["temp"]=array($_POST["situation"],$_POST["gender"],$_POST["age"]);
?>
<?php
$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$dbname="good";
//連接資料庫
$conn = new mysqli($servername, $username, $password, $dbname);
//中文編碼
mysqli_query($conn, "SET CHARACTER SET utf8");
//主餐
$sql = "SELECT * FROM menu WHERE menu_type='B'";
$result = $conn->query($sql);
$i=0;
while($row = $result->fetch_assoc()) {
	$main[$i]=$row["menu_name"];
	$i++;
}
$num=mysqli_num_rows($result);
?>

<html>
<head><meta charset="utf-8"><title>home2</title></head>
<body>
<div class="container"> 
<header><h4 class="logo">主餐選擇</h4></header>

<?php
//餐點選項按鈕
	echo "<form action='home22.php' method='post'>";
	echo "<br>主餐:";
	for($counter = 0; $counter < $num; $counter++)
		echo "<input type='radio' name='mainmeal' value='B0".($counter+1)."'>".$main[$counter];
	echo "<br><input type='submit' value='GO'></form>";
?>
</div>
</body>
</html>