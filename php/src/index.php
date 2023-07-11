<?php
require("./db/db.php");

$stmt = "SELECT * FROM test_tutorials";
$query = mysqli_query($connection, $stmt);
$rows = mysqli_fetch_all($query);

foreach ($rows as $row) {
	var_dump($row);
}

mysqli_close($connection);
?>
