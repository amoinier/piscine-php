#!/usr/bin/php
<?php
function is_zero($val) {
			return ($val || is_numeric($val));
	}
$str = trim($argv[1]);
$tab = preg_split("/[ \t]/", $str);
$tab = array_values(array_filter($tab, "is_zero"));
$i = count($tab);
if ($argc >= 2)
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
