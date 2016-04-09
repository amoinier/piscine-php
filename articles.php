<?php
session_start();
?>
<HTML>
	<HEAD><TITLE>Articles de E-CHEAP</TITLE>
	</HEAD>
		<BODY>
		<CENTER><H1>Voici les articles que vous pouvez acheter :</H1></CENTER>
		<br />
		<?php
		$file = "database/bdd.csv";
		if (!file_exists("database/bdd.csv"))
			file_put_contents("database/bdd.csv", "");
		$data = unserialize(file_get_contents("database/bdd.csv"));
		if ($data)
		{
			foreach ($data as $key => $val) {
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
			<INPUT TYPE='number' NAME='howmuch' step='1' value=''>&nbsp;&nbsp;
			<input border=0 src='img/basket.jpg' height='20' width='20' title='ajouter au panier' type='image' value=<?php echo $val['item'];?> name='item'></img>
			</FORM>
			<?php
			}
		}
		?>
		</BODY>
</HTML>
