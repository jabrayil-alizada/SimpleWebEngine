<?php
    //  вся процедура работает на сессиях. Именно в ней хранятся данные  пользователя, пока он находится на сайте. Очень важно запустить их в  самом начале странички!!!
    session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Tvoyazona.ru - Добро пожаловать на наш развлекательный портал!</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/index.css">
	<link href='https://fonts.googleapis.com/css?family=PT+Sans&subset=cyrillic,latin' rel='stylesheet' type='text/css'>
</head>
<body>
<div class="main">
	<header>
		<ul>
			<li><a href="#">ЛУЧШЕЕ</a></li>
			<li><a href="#">ГОРЯЧЕЕ</a></li>
		</ul>
		<?php
			if(!empty($_SESSION['name'])){
				echo "<a href='#' class='auth'>Выйти</a>
					  <a href='/user.php' class='auth'> <span style='color:red'>".$_SESSION['name']."</span> </a>";
			}
			else
			{
				echo "<a href='#' class='auth'>Регистрация</a>
					 <a href='/auth.php' class='auth'>Авторизация</a>";
			}
		?>
	</header>
</div>
</body>
</html>