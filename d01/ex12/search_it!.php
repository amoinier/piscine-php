#!/usr/bin/php
<?php
$tab = $argv;
unset($tab[0]);
$tab = array_values($tab);
$code = $tab[0];
$i = count($tab);
while ($i >= 0)
{
	if ($i > 0)
	{
		if (strstr($tab[$i], $code) && strstr($tab[$i], $code)[strlen($code)] == ':')
		{
			echo substr($tab[$i], strlen($code) + 1, strlen($tab[$i]))."\n";
			return (0);
		}
	}
	$i = $i - 1;
}
?>
