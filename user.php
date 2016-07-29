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
<section class="main">
	<div class="user_info content_bg">
		<?php

		require_once('connect.php');

		//$sql = "SELECT * FROM users WHERE name='".$_SESSION['name']."'";

		$sql = "SELECT * FROM users , users_group WHERE name='".$_SESSION['name']."' AND users.group_id = users_group.group_id";		

		$result = $conn->query($sql);

		// $user = $result->fetch_assoc();

		// echo $row['user_id']."</td><td>";


		if ($result->num_rows > 0) {
			$row = $result->fetch_assoc();
				echo "<ul class='user_info_ul'><li><span class='user_fields'>ИМЯ</span> <span class='user_data'>".$row['name']."</span></li>";
				echo "<li><span class='user_fields'>E-mail</span> <span class='user_data'>".$row['email']."</span></li>";
				echo "<li><span class='user_fields'>Группа</span> <span class='user_data'>".$row['group_name']."</span></li></ul>";
				echo "<img class='user_ava' src='".$row['avatar']."' alt = 'Аватарка пользователя ".$row['name']."'>";

				echo "<div class='user_news_bg'>
					     <ul class='user_news_ul'>
					     	<li><a href='#'>ДОБАВИТЬ НОВОСТЬ</a></li>
					     	<li><a href='#'>МОИ НОВОСТИ</a></li>
					     </ul>
					  </div>

					 <div class='clr'></div>";
		} else {
			echo "0 results";
		}


		echo "Заблокирован : ".$row['block'];
		?>
	</div>
</section>
</body>
</html>