<?php
    //  вся процедура работает на сессиях. Именно в ней хранятся данные  пользователя, пока он находится на сайте. Очень важно запустить их в  самом начале странички!!!
    session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<?php 
		require_once("settings.php");
	?>
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
				echo "<a href='/exit.php' class='auth'>Выйти</a>
					  <a href='/user.php' class='auth'> <span style='color:red'>".$_SESSION['name']."</span> </a>";
			}
			else
			{
				echo "<a href='/reg.php' class='auth'>Регистрация</a>
					 <a href='/enter.php' class='auth'>Авторизация</a>";
			}
		?>
	</header>
</div>
</body>
</html>