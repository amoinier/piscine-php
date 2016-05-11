#!/usr/bin/php
<?php
function ft_is_sort($tab1)
{
	$tab2 = $tab1;
	sort($tab2);
	foreach($tab1 as $key => $val)
	{
		if ($tab2[$key] !== $val)
			return (false);
	}
	return (true);
}
?>
