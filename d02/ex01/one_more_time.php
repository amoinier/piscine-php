#!/usr/bin/php
<?php
function month($str)
{
	if ($str === "Janvier")
		return (1);
	else if ($str === "Fevrier" || $str === "Février")
		return (2);
	else if ($str === "Mars")
		return (3);
	else if ($str === "Avril")
		return (4);
	else if ($str === "Mai")
		return (5);
	else if ($str === "Juin")
		return (6);
	else if ($str === "Juillet")
		return (7);
	else if ($str === "Aout" || $str === "Août")
		return (8);
	else if ($str === "Septembre")
		return (9);
	else if ($str === "Octobre")
		return (10);
	else if ($str === "Novembre")
		return (11);
	else if ($str === "Decembre" || $str === "Décembre")
		return (12);
	else
		return (0);
}
function day($str)
{
	if ($str === "Lundi")
		return (1);
	else if ($str === "Mardi")
		return (2);
	else if ($str === "Mercredi")
		return (3);
	else if ($str === "Jeudi")
		return (4);
	else if ($str === "Vendredi")
		return (5);
	else if ($str === "Samedi")
		return (6);
	else if ($str === "Dimanche")
		return (7);
	else
		return (0);
}
date_default_timezone_set("Europe/Paris");
$str = ucwords($argv[1]);
$tab = preg_split("/[ ]/", $str);
if (day($tab[0]) && preg_match("/[0-9]*/", $tab[1]) && $tab[1] <= 31 && $tab[1] >= 0 && month($tab[2]) &&
preg_match("/[0-9]+/", $tab[3]) && $tab[3] >= 1970 &&
preg_match("/[0-9]{2}:[0-9]{2}:[0-9]{2}/", $tab[4]))
{
	$time = preg_split("/[:]/", $tab[4]);
	if ($time[0] < 24 && $time >= 0 && $time[1] < 60 && $time[1] >= 0 && $time[2] < 60 && $time[2] >= 0)
	{
		echo mktime($time[0], $time[1], $time[2], month($tab[2]), $tab[1], $tab[3]);
		echo "\n";
	}
	else
		echo "Wrong Format\n";
}
else
	echo "Wrong Format\n";
?>
