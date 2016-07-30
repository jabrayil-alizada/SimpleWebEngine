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
<section class="main content_bg">
	<form action="add_news.php" method="POST" enctype="multipart/form-data">
		<label>Заголовок поста</label>
		<input type="text" name="news_title" required>
		<label>Текст</label>
		<textarea name="news_text" required></textarea> 

		<input type="submit" name="submit" value="Добавить новость">
	</form>
</section>
</body>
</html>