<?php

require_once('connect.php');


$sql = "SELECT * FROM `users`";	

$result = $conn->query($sql);

// $user = $result->fetch_assoc();

// echo $row['user_id']."</td><td>";


if ($result->num_rows > 0) {
	while($row = $result->fetch_assoc()) {
		echo "<table border=1><tr><th>User ID</th>	<th>Name</th>	<th>Pass</th>	<th>Email</th>	<th>Avatar</th>	<th>Block</th>	<th>Group_id</th></tr>	<tr><td>";
		echo $row['user_id']."</td><td>";
		echo $row['name']."</td><td>";
		echo $row['pass']."</td><td>";
		echo $row['email']."</td><td>";
		echo $row['avatar']."</td><td>";
		echo $row['block']."</td><td>";
		echo $row['group_id']."</td></tr>";
	}
} else {
	echo "0 results";
}

?>