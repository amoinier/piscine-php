<?php
session_start();
?>
<HTML>
	<HEAD><TITLE>Articles de E-CHEAP</TITLE>
	</HEAD>
		<BODY>
		<CENTER><H1>Voici les articles que vous pouvez acheter :</H1></CENTER>
		<br />
​
		<?php
		if (!$_POST)
		{
			$what = 1;
		}
		if (!file_exists("database/bdd.csv"))
			file_put_contents("database/bdd.csv", "");
		$data = unserialize(file_get_contents("database/bdd.csv"));
		?>
				<form action="articles.php" method="post">
					<select name='categorie1' size='1'>
						<?php
						$cat = unserialize(file_get_contents("database/category.csv"));
						$i = 0;
						foreach ($cat as $key =>$val2)
						{
							if ($_POST['categorie1'] === $val2['catname'])
							{
								echo "<option selected value=".$_POST['categorie1'].">".$_POST['categorie1']."</option>";
								$ok = $key;
							}
							else
							{
								echo "<option value=".$val2['catname'].">".$val2['catname']."</option>";
							}
						}
						?>
					</select>
				<input type="submit" value="list" name="<?= $ok ?>"></form>
				</form>
​
		<?php
		$file = "database/bdd.csv";
		if (!file_exists("database/bdd.csv"))
			file_put_contents("database/bdd.csv", "");
		$data = unserialize(file_get_contents("database/bdd.csv"));
		if ($data)
		{
			foreach ($data as $key => $val) {
				if ($what === 1 OR $_POST['categorie1'] === $val['categorie1'] OR $_POST['categorie1'] === $val['categorie2'])
				{
					if ($data[$key]['qte'] > 0)
					{
						?>
						<secion><H2><?php echo $val['item'];?></H2>
							<b>categorie1: </b><?php echo $val['categorie1'];?>&nbsp;&nbsp;
							<b>Categorie2: </b><?php echo $val['categorie2'];?>&nbsp;&nbsp;
							<b>Qte dispo: </b><?php echo $val['qte'];?>&nbsp;&nbsp;
							<b>Prix:  </b><?php echo $val['prix'];?>euros
							​
						<FORM ACTION='echoitem.php' METHOD='post'>
							<BR />
						<INPUT TYPE='hidden' NAME='prix' value=<?php echo $val['prix'];?>>
						<INPUT TYPE='hidden' NAME='categorie1' value=<?php echo $val['categorie1'];?>>
						<INPUT TYPE='hidden' NAME='categorie2' value=<?php echo $val['categorie2'];?>>
						<INPUT TYPE='number' NAME='howmuch' step='1' min="0" max=<?php echo $val['qte'];?> value=''>&nbsp;&nbsp;
						<input border=0 src='img/basket.jpg' height='20' width='20' title='ajouter au panier' type='image' value=<?php echo $val['item'];?> name='item'></img>
						</FORM>
						<?php
					}
				}
			}
		}
		?>
		</BODY>
</HTML>
