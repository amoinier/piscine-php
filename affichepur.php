<?php
session_start();
include ('inc.php');
?>
<HTML>
	<HEAD><TITLE>Panier</TITLE>
	</HEAD>
		<BODY>
		<CENTER><H1>Ancienne Commandes</H1></CENTER>
		<?php
		if ($_SESSION['login'])
		{
			$data = unserialize(file_get_contents("database/account.csv"));
			$i = 1;
			if ($data)
			{
				foreach ($data as $key => $val)
				{
					if ($val['login'] === $_SESSION['login'])
					{
						$i = 0;
						$ok = $key;
					}
				}
			}
			if ($i == 0)
			{
				foreach ($data[$ok]['purchase'] as $key => $val) {
					?><b>Commande <?= $key + 1?> :</b><br /><?php
					foreach ($val as $val2)
					{?>
						<b>Produit: </b><?php echo $val2['item'];?>&nbsp;&nbsp;
						<b>Categorie1: </b><?php echo $val2['categorie1'];?>&nbsp;&nbsp;
						<b>Categorie2: </b><?php echo $val2['categorie2'];?>&nbsp;&nbsp;
						<b>Qte: </b><?php echo $val2['qte'];?>
						<b>Prix: </b><?php echo $val2['prix'] * $val2['qte'];?> euro(s)&nbsp;&nbsp;<br />
						<?php
						$total = $total + ($val2['prix'] * $val2['qte']);
					}?>
					<b>Total: </b><?php echo $total;?> euro(s)&nbsp;<BR /><br />
					<?php
				}
			}
		}
		else
			echo "Vous n'avez jamais commandé.\n";
		?>
		</BODY>
</HTML>
