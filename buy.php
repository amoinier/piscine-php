<?php
	session_start();
	if ($_POST['submit'] === BUY)
	{
		?>
		Are you sure ?<br />
		<form action="addpurchase.php" method="post">
			<input type="submit" name="submit" value="NO">
			<input type="submit" name="submit" value="YES">
		</form><?php
	}?>
