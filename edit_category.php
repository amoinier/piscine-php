<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Edit category</title>
	</head>
	<body>
		<?php
		if (!file_exists("database/category.csv"))
			file_put_contents("database/category.csv", "");
		$data = unserialize(file_get_contents("database/category.csv"));
		if ($data)
		{
			foreach ($data as $key => $val)
			{
				?>
				<form action="editcat.php" method="post">
					Category name: <input type="text" name="catname" value="<?php echo $val['catname'];?>">
					<input type="submit" name="submit" value="EDIT">
					<input type="submit" name="submit" value="DEL"><br />
				</form>
				<?php
			}
		}
		?><br />
		<form action="addcat.php" method="post">
			Category name: <input type="text" name="catname" value="">
			<input type="submit" name="submit" value="ADD"><br />
		</form>
	</body>
</html>
