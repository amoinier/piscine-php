<?php
function auth($login, $passwd)
{
	if (file_exists("../private") && file_exists("../private/passwd"))
	{
		$data = unserialize(file_get_contents("../private/passwd"));
		if ($data)
		{
			foreach ($data as $val)
			{
				if ($val['login'] === $login && $val['passwd'] === hash(whirlpool, $passwd))
					return (true);
			}
		}
	}
	return (false);
}
?>
