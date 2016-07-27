<?php

$name = $_POST['name'];
$pass = $_POST['pass'];
$email = $_POST['email'];
$group_id = 2;


require_once('connect.php');

// $sql = "INSERT INTO users (name,pass,email)
// 		VALUES ('".$name."','".$pass."','".$email."')";

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
if (copy($_FILES['uploadfile']['tmp_name'], get_random_file_name($uploaddir,$extension)))
{
echo "<h3>Файл успешно загружен на сервер</h3>";
}
else { echo "<h3>Ошибка! Не удалось загрузить файл на сервер!</h3>"; exit; }

// Выводим информацию о загруженном файле:
echo "<h3>Информация о загруженном на сервер файле: </h3>";
echo "<p><b>Оригинальное имя загруженного файла: ".$_FILES['uploadfile']['name']."</b></p>";
echo "<p><b>Mime-тип загруженного файла: ".$_FILES['uploadfile']['type']."</b></p>";
echo "<p><b>Размер загруженного файла в байтах: ".$_FILES['uploadfile']['size']."</b></p>";
echo "<p><b>Временное имя файла: ".$_FILES['uploadfile']['tmp_name']."</b></p>";

$sql = "INSERT INTO users (name,pass,email,group_id,avatar)
		VALUES ('".$name."','".$pass."','".$email."',2,'".$uploadfile."')";	

if($conn->query($sql) === TRUE){
	echo "New record created successfully";
} else {
	echo "Error: ".$sql."<br>".$conn->error;
}

$conn->close();

?>