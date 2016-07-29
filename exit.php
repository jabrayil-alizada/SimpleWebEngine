<?php
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

</body>
</html>

<?php
if    (empty($_SESSION['name']) or empty($_SESSION['id'])) 
{
          //если не существует сессии с логином и паролем, значит на    этот файл попал невошедший пользователь. Ему тут не место. Выдаем сообщение    об ошибке, останавливаем скрипт
  exit ("Доступ на эту    страницу разрешен только зарегистрированным пользователям. Если вы    зарегистрированы, то войдите на сайт под своим логином и паролем<br><a    href='/index.php'>Главная    страница</a>");
}
          
unset($_SESSION['password']);
unset($_SESSION['name']); 
unset($_SESSION['id']);//    уничтожаем переменные в сессиях
exit("<html><head><meta    http-equiv='Refresh' content='0;    URL=/index.php'></head></html>");
// отправляем пользователя на главную страницу.
?>