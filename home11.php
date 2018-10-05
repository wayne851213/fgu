<!doctype html>
<link href="../css/singlePageTemplate.css" rel="stylesheet" type="text/css" /> 
<html>
<head><meta charset="utf-8"><title>無標題文件</title></head>
<body>
<?php
$servername = "localhost"; 
$username = "root"; 
$password = "";
$dbname="good";
$conn = new mysqli($servername, $username, $password, $dbname);
mysqli_query($conn, "SET CHARACTER SET utf8");
?>

新增:
<form action='home11.php' method='post'>
<label for='textfield'>產品名稱:</label><input type='text' name='myname'>
<label for='textfield'>產品價格:</label><input type='text' name='myprice'>
<label for='textfield'>產品類別:</label>
<select name='mytypes'>
<option>選擇類別</option>
<option value='A'>A</option>
<option value='B'>B</option>
<option value='C'>C</option>
<option value='D'>D</option>
</select>
<input type='submit' name='send' value='提交'>
<br><br><br></form>

<?php
//表單全部不為空
if (!empty($_POST["myname"])&&!empty($_POST["myprice"])&&!empty($_POST["mytypes"])) {
	//查詢有幾筆資料
  $mytypes=$_POST["mytypes"];
  $sql = "SELECT * FROM menu WHERE menu_type='$mytypes'";
  $result = $conn->query($sql);
  $num=mysqli_num_rows($result);
  $num++;
  //前面加零
  $stringA='0';
  $stringB=$stringA.$num;
	//接收值
  $myname=$_POST["myname"];
  $myprice=$_POST["myprice"];
	//編號10以下
  if ($num<10) {
    $sql = "INSERT INTO menu (menu_id, menu_type, menu_name, menu_price) 
  	VALUES ('$mytypes$stringB','$mytypes','$myname','$myprice')";
      if ($conn->query($sql) === true) {
        echo "新记录插入成功";
      } else {
          echo "Error: " . $sql . "<br>" . $conn->error;
        }
	}
	//編號10以上
	else {
    $sql = "INSERT INTO menu (menu_id, menu_type, menu_name, menu_price) 
  	VALUES ('$mytypes$num','$mytypes','$myname','$myprice')";
      if ($conn->query($sql) === true) {
        echo "新记录插入成功";
      } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
  }
  mysqli_free_result($result);
}
//點選提交AND其中有空值
else if(!empty($_POST["send"])&&
(empty($_POST["myname"])||empty($_POST["myprice"])||empty($_POST["mytypes"]))){
	echo '<script type="text/javascript">';
	echo 'alert("請輸入完整資訊!")';
	echo '</script>';
}
?>





<table width="720" border="1">
<tbody>
  <tr height="100">
  <th scope="col">產品ID</th>
  <th scope="col">產品名稱</th>
  <th scope="col">產品價格</th>
	<th scope="col">產品類型</th>
	<th scope="col">修改/刪除</th>
  </tr>
  
  <?php
	$sql2 = "SELECT * FROM menu";
	$result2 = $conn->query($sql2);
  $num2 = mysqli_num_rows($result2);
	
	for($i=1;$i<=$num2;$i++)
		{
			$row = mysqli_fetch_row($result2);
			$id = $row[0];
			$name = $row[2];
			$price = $row[3];
			$type = $row[1];
			echo "<tr><form>";
			echo "<td align='center'><input type=text name='i' value='$id'></td>";
			echo "<td align='center'><input type=text name='n' value='$name'></td>";
			echo "<td align='center'><input type=text name='p' value='$price'></td>";
			echo "<td align='center'><input type=text name='t' value='$type'></td>";
			echo "<td align='center'><input type='submit' name='submit' value='修改'/>
			<input type='submit'name='submit' value='刪除'></td>";
			echo"</form></tr>";
		}
	?>
</tbody>
</table>

</body>
</html>