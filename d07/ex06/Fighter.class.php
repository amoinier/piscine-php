<?php
abstract Class Fighter
{
	private $_type;

	public function __construct($string)
	{
		$this->_type = $string;
		return;
	}

	abstract public function fight($string);

	public function ret_str()
	{
		return $this->_type;
	}
}
?>
