<!doctype html>
<link href="../css/singlePageTemplate.css" rel="stylesheet" type="text/css" /> 

<html>
<head>
<meta charset="utf-8">
<title>home1</title>
</head>

<body>
<div class="container"> 
<header><h4 class="logo">特徵蒐集</h4></header>
	
  <form action="home21.php" method="post">
	<p>情境選擇</p>
	<input type="radio" name="situation" value="family">家人
	<input type="radio" name="situation" value="friend">朋友
	<input type="radio" name="situation" value="boyandgirl">情侶
	<input type="radio" name="situation" value="one">個人
	<input type="radio" name="situation" value="other">其他
	<br>
	<p>性別選擇</p>
	<input type="radio" name="gender" value="boy">男
	<input type="radio" name="gender" value="girl">女
	<br>
	<p>年齡層</p>
	<input type="radio" name="age" value="young">青年
	<input type="radio" name="age" value="mid">中年
	<input type="radio" name="age" value="old">老年
	<br>
	<input type="submit" value="GO">
	</form>
</div>
</body>
</html>

