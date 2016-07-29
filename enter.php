<?php
    //  вся процедура работает на сессиях. Именно в ней хранятся данные  пользователя, пока он находится на сайте. Очень важно запустить их в  самом начале странички!!!
    session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<?php
        require_once('settings.php');
    ?>
</head>
<body>

<section class="auth_panel">
		<form action="auth.php" method="POST">
			<label>Имя</label>
			<input type="text" name="name">
			<label>Пароль</label>
			<input type="password" name="password">

			<input type="submit" name="submit" value="Войти">
		</form>
</section>

<?php
    // Проверяем, пусты ли переменные логина и id пользователя
    if (empty($_SESSION['name']) or empty($_SESSION['id'])) {
    	// Если пусты, то мы не выводим ссылку
    	echo "Вы вошли на сайт, как гость<br><a href='#'>Эта ссылка  доступна только зарегистрированным пользователям</a>";
    }
    else {
    	// Если не пусты, то мы выводим ссылку
    	echo "Вы вошли на сайт, как ".$_SESSION['name']."<br><a  href='http://tvoyazonarusite/'>Эта ссылка доступна только  зарегистрированным пользователям</a>";
    }
?>
</body>
</html>