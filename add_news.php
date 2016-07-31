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
<section class="main content_bg" style="margin-top:20px; padding-bottom:20px;">
	<h2 class="news_title"> Добавить новость</h2>


	<form action="add_news_handler.php" method="POST" enctype="multipart/form-data">
		<ul class='user_addnews_ul'>
			<li><span class='user_fields add_news_user_fields'>ЗАГОЛОВОК</span> <input class='user_data add_news_user_data' style="padding-top:0;" type="text" name="news_title" placeholder="Заголовок" required></li>
			<li><span class='user_fields add_news_user_fields'>ТЕКСТ</span> <textarea class='user_data add_news_user_data' name="news_text" placeholder="Заполни меня полностью!" required></textarea> </li>
			<li><span class='user_fields add_news_user_fields'>ИЗОБРАЖЕНИЕ</span> <input class='user_data add_news_user_data' style="padding-top:2px;" type="file" name="uploadfile"></li>
		</ul>

		<div class="clr"></div>

		<input type="submit" name="submit" value="ОТПРАВИТЬ">

		<div class="clr"></div>

	</form>	
</section>
</body>
</html>
