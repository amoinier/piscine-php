<?php
date_default_timezone_set("Europe/Paris");
if (file_exists("../private") && file_exists("../private/chat"))
{
	$data = unserialize(file_get_contents("../private/chat"));
	if ($data)
	{
		foreach ($data as $key => $val)
		{
			echo "[" . date("G", $val['time']) . ":" . date("i", $val['time']) . "] <b>";
			echo $val['login']."</b>: ";
			echo $val['msg']."<br />\n";
		}
	}
}
?>
