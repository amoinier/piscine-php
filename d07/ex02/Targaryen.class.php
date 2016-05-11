<?php
class Targaryen {
	public function __construct() {
		return ;
	}

	public function __destruct() {
		return ;
	}

	public function resistsFire() {
		return false;
	}
	public function getBurned() {
		if (static::resistsFire() == True)
		{
			return 'emerges naked but unharmed';
		}
		else if (static::resistsFire() == False)
		{
			return 'burns alive';
		}
	}
}
?>
