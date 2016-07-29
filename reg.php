<!DOCTYPE html>
<html>
<head>
	<title>Registration</title>
	<meta charset="utf-8">
</head>
<body>
<fieldset>
	<legend>Регистрация</legend>

	<form method="POST" action="check.php" enctype="multipart/form-data">
	<span>Имя</span>
	<input type="text" name="name" required>
	<span>Пароль</span>
	<input type="password" name="pass" required>
	<span>E-mail</span>
	<input type="text" name="email" required>


	<!-- <span>Аватарка</span>
	<input type="file" name="uploadfile"> -->



	<!-- <select name="cat_name">
		<?php
		
		require_once('connect.php');
		//getting all categories from db
		$sql = "SELECT * FROM `news_cat`";	

		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
		    // output data of each row
		    while($row = $result->fetch_assoc()) {
		        echo "<option value=".$row['cat_id'].">".$row["cat_name"]."</option>";
		    }
		} else {
		    echo "0 results";
		}

		$conn->close();

		?>
	</select> -->

	<br><br><button>Регистрация</button>
	</form>

	<!-- <legend>Категорию</legend>

	<form method="POST" action="check.php">
	<span>Название категории</span>
	<input type="text" name="catName">

	<button>Добавить категорию</button>
	</form> -->
</fieldset>
</body>
</html>