<fieldset>
	<legend>Регистрация</legend>

	<form method="POST" action="check.php">
	<span>Имя</span>
	<input type="text" name="name">
	<span>Пароль</span>
	<input type="password" name="pass">
	<span>E-mail</span>
	<input type="text" name="email">
	<select>
		<?php
		
		require_once('connect.php');

		$sql = "SELECT * FROM `news_cat`";	

		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
		    // output data of each row
		    while($row = $result->fetch_assoc()) {
		        echo "<option>".$row["cat_name"]."</option>";
		    }
		} else {
		    echo "0 results";
		}

		$conn->close();

		?>
	</select>

	<button>Регистрация</button>
	</form>

	<!-- <legend>Категорию</legend>

	<form method="POST" action="check.php">
	<span>Название категории</span>
	<input type="text" name="catName">

	<button>Добавить категорию</button>
	</form> -->
</fieldset>