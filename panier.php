<?php
session_start();
?>
<HTML>
	<HEAD><TITLE>Panier</TITLE>
	</HEAD>
		<BODY>
		<CENTER><H1>Contenu de votre panier</H1></CENTER>
		<?php
		if ($_SESSION['basket'])
		{
			foreach ($_SESSION['basket'] as $val)
			{?>
				<form action="editpanier.php" method="post">
					<b>Produit: </b><?php echo $val['item'];?><input type="hidden" name="item" value=<?php echo $val['item'];?>>&nbsp;&nbsp;
					<b>Categorie1: </b><?php echo $val['categorie1'];?>&nbsp;&nbsp;
					<b>Categorie2: </b><?php echo $val['categorie2'];?>&nbsp;&nbsp;
					<b>Qte: </b><input type="number" name="qte" value="<?php echo $val['qte'];?>">
					<b>Prix: </b><?php echo $val['prix'] * $val['qte'];?>&nbsp;&nbsp;
					<input type="submit" name="submit" value="EDIT">
					<input type="submit" name="submit" value="DEL"><br />
				</form>
				<?php
				$total = $total + ($val['prix'] * $val['qte']);
			}?>
			<b>Total: </b><?php echo $total;?>&nbsp;<BR />
			<?php
		}
		else
			echo "Votre panier est vide\n";
		?>
		</BODY>
</HTML>
