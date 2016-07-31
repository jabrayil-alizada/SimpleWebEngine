<?php
session_start();//  вся процедура работает на сессиях. Именно в ней хранятся данные  пользователя, пока он находится на сайте. Очень важно запустить их в  самом начале странички!!!
?>

<!DOCTYPE html>
<html>
<head>
	<?php
		require_once('settings.php');
	?>
</head>
<body>
<?php

if (isset($_POST['news_title'])) { $name = $_POST['news_title']; if ($name == '') { unset($name);} } //заносим введенный пользователем имя в переменную $name, если он пустой, то уничтожаем переменную
if (isset($_POST['news_text'])) { $news_text = $_POST['news_text']; if ($news_text == '') { unset($news_text);} } //заносим введенный пользователем пароль в переменную $password, если он пустой, то уничтожаем переменную


//если имя и пароль введены, то обрабатываем их, чтобы теги и скрипты не работали, мало ли что люди могут ввести
$name = stripslashes($name);
$name = htmlspecialchars($name);
$news_text = stripslashes($news_text);
$news_text = htmlspecialchars($news_text);

function string_sanitize($news_text) {
    $result = preg_replace("/'/", "", $news_text);

    return $result;
}

$news_text = string_sanitize($news_text);

//удаляем лишние пробелы
$name = trim($name);

// ID юзера который добавляет новость
$user_id = $_SESSION['id'];

//Категория в которую добавляются новости
$cat_id = 4;

// Каталог, в который мы будем принимать файл:
$uploaddir = './news_img/';
$extension = ".".basename($_FILES['uploadfile']['type']);


//Создаем уникальное имя для файла и проверяем не существует ли такого
function get_random_file_name($uploaddir, $extension){
	do {
    	$file_name = md5(microtime() . rand(0, 9999));
    	$uploadfile = $uploaddir.$file_name.$extension;
	} while (file_exists($uploadfile));
 
	return $uploadfile;
}



// Копируем файл из каталога для временного хранения файлов:
if (copy($_FILES['uploadfile']['tmp_name'], $uploadfile = get_random_file_name($uploaddir,$extension)))
{

}
else { echo "<h3>Ошибка! Не удалось загрузить файл на сервер!</h3>"; exit; }


// Подключаемся к базе
require_once('connect.php');

$sql = "INSERT INTO news (title, news_text, user_id, cat_id, news_img )
		VALUES ('".$name."', '".$news_text."', '".$user_id."', '".$cat_id."','".$uploadfile."')";	

if($conn->query($sql) === TRUE){
	echo "Новости успешно добавлена, она теперь на <a href='index.php'>главной странице</a>";
} else {
	echo "Ошибка! Вы не зарегистрированы: ".$sql."<br>".$conn->error;
}

$conn->close();

?>
</body>
</html>