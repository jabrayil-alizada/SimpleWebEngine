<?php

if (isset($_POST['name'])) { $name = $_POST['name']; if ($name == '') { unset($name);} } //заносим введенный пользователем имя в переменную $name, если он пустой, то уничтожаем переменную
if (isset($_POST['pass'])) { $pass = $_POST['pass']; if ($pass == '') { unset($pass);} } //заносим введенный пользователем пароль в переменную $password, если он пустой, то уничтожаем переменную
if (isset($_POST['email'])) { $email = $_POST['email']; if ($email = '') { unset($email); }} //заносим введенный пользователем email в переменную $email, если он пустой, то уничтожаем переменную

//если имя и пароль введены, то обрабатываем их, чтобы теги и скрипты не работали, мало ли что люди могут ввести
$name = stripslashes($name);
$name = htmlspecialchars($name);
$pass = stripslashes($pass);
$pass = htmlspecialchars($pass);

//удаляем лишние пробелы
$name = trim($name);
$pass = trim($pass);

//Группа в которую добавляются зарегистрированные
$group_id = 2;

// Подключаемся к базе
require_once('connect.php');

// Проверяем существует ли такой пользователь
$sql = "SELECT user_id FROM users WHERE name='".$name."'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
	// output data of each row
	exit ("Извините, введённый вами логин уже зарегистрирован. Введите другой логин.");
}

// Если такого пользователя нет то добавляем
$sql = "INSERT INTO users (name,pass,email,group_id)
		VALUES ('".$name."','".$pass."','".$email."',2)";	

if($conn->query($sql) === TRUE){
	echo "Вы успешно зарегистрированы! Теперь вы можете зайти на сайт. <a href='index.php'>Главная страница</a>";
} else {
	echo "Ошибка! Вы не зарегистрированы: ".$sql."<br>".$conn->error;
}

$conn->close();

?>