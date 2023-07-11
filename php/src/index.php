	<?php
	require("./db/db.php");
	$user = "";
	if(isset($_GET["user"])) {
		$user = mysqli_real_escape_string($connection, $_GET["user"]);
		$stmt = "SELECT id, name, status FROM test_tutorials WHERE name LIKE '%$user%' ORDER BY status DESC";
	} else {
		$stmt = "SELECT id, name, status FROM test_tutorials ORDER BY status DESC";
	}
	$query = mysqli_query($connection, $stmt);
	$rows = mysqli_fetch_all($query, MYSQLI_ASSOC);
	?>
	<!DOCTYPE html>
	<html lang="en">

	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Soba</title>
	</head>

	<body>
		<header>
			<div>
				<h1>Soba</h1>
			</div>
			<div>
				<h2>Social Media for Japanese Food Lover</h2>
			</div>
		</header>
		<section id="user-search-section">
			<form>
				<input type="text" name="user" placeholder="Search User" value="<?php echo $user; ?>">
				<input type="submit" value="Search">
			</form>
		</section>
		<section id="user-status-section">
			<div>
				<?php foreach ($rows as $row) : ?>
					<?php if ($row["status"] == "ONLINE") : ?>
						<h3>Online User</h3>
						<p><?php echo "$row[name] ($row[status])"; ?></p>
					<?php endif; ?>
					<?php if ($row["status"] == "OFFLINE") : ?>
						<h3>Offline User</h3>
						<p><?php echo "$row[name] ($row[status])"; ?></p>
					<?php endif; ?>
				<?php endforeach; ?>
			</div>
		</section>
	</body>

	</html>


	<?php
	mysqli_close($connection);
	?>
