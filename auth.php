<?php
    session_start();//  вся процедура работает на сессиях. Именно в ней хранятся данные  пользователя, пока он находится на сайте. Очень важно запустить их в  самом начале странички!!!
?>

<!DOCTYPE html>
<html>
<head>
    <title>Auth</title>
    <meta charset="utf-8">
</head>
<body>
<?php


if (isset($_POST['name'])) { $name = $_POST['name']; if ($name == '') { unset($name);} } //заносим введенный пользователем логин в переменную $name, если он пустой, то уничтожаем переменную
if (isset($_POST['password'])) { $password=$_POST['password']; if ($password =='') { unset($password);} } //заносим введенный пользователем пароль в переменную $password, если он пустой, то уничтожаем переменную

if (empty($name) or empty($password)) //если пользователь не ввел логин или пароль, то выдаем ошибку и останавливаем скрипт
{
    exit ("Вы ввели не всю информацию, вернитесь назад и заполните все поля!");
}
    //если логин и пароль введены,то обрабатываем их, чтобы теги и скрипты не работали, мало ли что люди могут ввести
    $name = stripslashes($name);
    $name = htmlspecialchars($name);
	$password = stripslashes($password);
    $password = htmlspecialchars($password);

    //удаляем лишние пробелы
    $name = trim($name);
    $password = trim($password);

    // подключаемся к базе
    require_once ("connect.php");// файл bd.php должен быть в той же папке, что и все остальные, если это не так, то просто измените путь 

    $sql = "SELECT * FROM users WHERE name = '".$name."'";	

	$result = $conn->query($sql);

	$myrow = $result->fetch_assoc();

    if (empty($myrow['pass']))
    {
        //если пользователя с введенным логином не существует
        exit ("Извините, введённое вами имя или пароль неверный.");
    }
    else {
	    //если существует, то сверяем пароли
	    if ($myrow['pass'] == $password) {
	       //если пароли совпадают, то запускаем пользователю сессию! Можете его поздравить, он вошел!
	       $_SESSION['name']=$myrow['name']; 
	       $_SESSION['id']=$myrow['user_id'];//эти данные очень часто используются, вот их и будет "носить с собой" вошедший пользователь
	       echo "Вы успешно вошли на сайт! <a href='index.php'>Главная страница</a>";
	    }
	 	else {
	       //если пароли не сошлись
	       exit ("Извините, введённый вами name или пароль неверный.111");
	    }
    }
?>
</body>
</html>