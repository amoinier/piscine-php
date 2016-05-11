#!/usr/bin/php
<?php
$str = trim($argv[1]);
$tab = explode(' ', $str);
$tab = array_values(array_filter($tab));
$i = count($tab);
if ($argc == 2)
{
	foreach ($tab as $key => $val)
	{
		echo $val;
		if ($key < $i - 1)
			echo " ";
	}
	echo "\n";
}
?>
