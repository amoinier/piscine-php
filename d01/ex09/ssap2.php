#!/usr/bin/php
<?php
function ft_split($str)
{
	$tab = explode(' ', $str);
	sort($tab);
	$tab = array_values(array_filter($tab));
	return ($tab);
}

function is_digit($c)
{
	if (ord($c) >= 48 && ord($c) <= 57)
		return (1);
	else
		return (0);
}

function is_alpha($c)
{
	if (ord($c) >= 97 && ord($c) <= 122)
		return (1);
	else
		return (0);
}

function compare($str1, $str2)
{
	$i = 0;
	while ($str1[$i] && $str2[$i])
	{
		if ($str1[$i] != $str2[$i])
		{
			if (is_alpha($str1[$i]))
			{
				if (is_digit($str2[$i]))
					return (-1);
				else if (!is_alpha($str2[$i]) && !is_digit($str2[$i]))
					return (-1);
				else
					return (strcmp($str1[$i], $str2[$i]));
			}
			else if (is_digit($str1[$i]))
			{
				if (!is_alpha($str2[$i]) && !is_digit($str2[$i]))
					return (1);
				else if (is_alpha($str2[$i]))
					return (1);
				else
				{
					if ($str[$i] >= $str[$i])
						return (1);
					else
						return (-1);
				}
			}
			else
			{
				if (is_digit($str2[$i]) || is_alpha($str2[$i]))
					return (1);
				else
					return (strcmp($str1[$i], $str2[$i]));
			}
		}
		$i++;
	}
	return (0);
}

function ft_cmp($str3, $str4)
{
	$str1 = strtolower($str3);
	$str2 = strtolower($str4);
	$c1 = substr($str1, 0, 1);
	$c2 = substr($str2, 0, 1);
	if (is_alpha($c1))
	{
		if (is_alpha($c2))
		{
			if (compare($str1, $str2) > 0)
				return (1);
			else
				return (-1);
		}
		else
			return (-1);
	}
	else if (is_digit($c1))
	{
		if (!is_alpha($c2) && !is_digit($c2))
			return (-1);
		else if (is_alpha($c2))
			return (1);
		else if (is_digit($c2))
		{
			if ($str1 <= $str2)
				return (1);
			else
				return (-1);
		}
	}
	else if (!is_alpha($c1) && !is_digit($c1))
	{
		if (is_alpha($c2))
			return (1);
		else if (is_digit($c2))
			return (1);
		else if (!is_alpha($c2) && !is_digit($c2))
		{
			if (compare($str1, $str2) > 0)
				return (1);
			else
				return (-1);
		}
	}
}
$tab = $argv;
unset($tab[0]);
$tab = array_values($tab);
$tab2 = array();
foreach ($tab as $key => $val)
{
	if (strstr($val, ' '))
	{
		$tab2 = array_merge($tab2, ft_split($val));
		unset($tab[$key]);
	}
}
$tab = array_merge($tab, $tab2);
usort($tab, 'ft_cmp');
foreach ($tab as $val)
	echo $val."\n";
?>
