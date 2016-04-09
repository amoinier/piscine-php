<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Edit item</title>
	</head>
	<body>
		<?php
		include("is_cat.php");
		if (!file_exists("database/bdd.csv"))
			file_put_contents("database/bdd.csv", "");
		$data = unserialize(file_get_contents("database/bdd.csv"));
		if ($data)
		{
			foreach ($data as $key => $val)
			{
				?>
				<form action="editobj.php" method="post">
					Item: <?php echo $val['item'];?><input type="hidden" name="item" value="<?php echo $val['item'];?>">
					<select name='categorie1' size='1'>
						<?php
						is_cat($val, 'categorie1', 1);?>
					</select>
					<select name='categorie2' size='1'>
					<?php
					is_cat($val, 'categorie2', 1);
					?></select>
					&nbsp;Qantity: <input type="number" name="qte" value="<?php echo $val['qte'];?>">
					&nbsp;Prix (euros): <input type="text" name="prix" value="<?php echo $val['prix'];?>">
					<input type="submit" name="submit" value="EDIT">
					<input type="submit" name="submit" value="DEL"><br />
				</form>
				<?php
			}
		}
		?><br />
		<form action="addobj.php" method="post">
			Item : <input type="text" name="item">
			<select name='categorie1' size='1'>
				<?php
				is_cat($val, 'categorie1', 0);?>
			</select>
			<select name='categorie2' size='1'>
			<?php
			is_cat($val, 'categorie2', 0);
			?></select>
			&nbsp;Qantity: <input type="number" name="qte">
			&nbsp;Prix (euros): <input type="text" name="prix">
			<input type="submit" name="submit" value="ADD"><br />
		</form>
	</body>
</html>
