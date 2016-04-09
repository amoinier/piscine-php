<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Edit user</title>
	</head>
	<body>
		<?php
		if (!file_exists("database/account.csv"))
			file_put_contents("database/account.csv", "");
		$data = unserialize(file_get_contents("database/account.csv"));
		if ($data)
		{
			foreach ($data as $key => $val)
			{
				?>
				<form action="edituser.php" method="post">
					Pseudo: <input type="text" name="login" value="<?php echo $val['login'];?>">
					&nbsp;First name: <input type="text" name="fname" value="<?php echo $val['fname'];?>">
					&nbsp;Last name: <input type="text" name="lname" value="<?php echo $val['lname'];?>">
					&nbsp;Mail: <input type="email" name="mail" value="<?php echo $val['mail'];?>">
					&nbsp;Street: <input type="text" name="street" value="<?php echo $val['street'];?>">
					&nbsp;Postal code: <input type="text" name="postalcode" value="<?php echo $val['postalcode'];?>">
					&nbsp;City: <input type="text" name="city" value="<?php echo $val['city'];?>">
					&nbsp;Admin: <input type="text" name="admin" value="<?php echo $val['admin'];?>">
					&nbsp;<input type="hidden" name="id" value="<?php echo $val['id'];?>">
					<input type="submit" name="submit" value="EDIT">
					<input type="submit" name="submit" value="DEL"><br />
				</form>
				<?php
			}
		}
		?><br />
		<form action="adduser.php" method="post">
			Pseudo: <input type="text" name="login" value="">
			&nbsp;Password: <input type="password" name="passwd" value="">
			&nbsp;First name: <input type="text" name="fname" value="">
			&nbsp;Last name: <input type="text" name="lname" value="">
			&nbsp;Mail: <input type="email" name="mail" value="">
			&nbsp;Street: <input type="text" name="street" value="">
			&nbsp;Postal code: <input type="text" name="postalcode" value="">
			&nbsp;City: <input type="text" name="city" value="">
			&nbsp;Admin: <input type="text" name="admin" value="<?php echo $val['admin'];?>">
			<input type="submit" name="submit" value="ADD"><br />
		</form>
	</body>
</html>
