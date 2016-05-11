<?php
Class UnholyFactory
{
	private $_squad = array();

	public function absorb($perso)
	{
		if (!$perso instanceof Fighter)
		{
			print ("(Factory can't absorb this, it's not a fighter)".PHP_EOL);
			return ;
		}
		$str = $perso->ret_str();
		if (!is_null($str) && !is_null($this->_squad) && array_key_exists($str, $this->_squad))
		{
				print ("(Factory already absorbed a fighter of type ".$str.")".PHP_EOL);

		}
		else if (!is_null($str))
		{
			print ("(Factory absorbed a fighter of type ".$str.")".PHP_EOL);
			$this->_squad[$str] = $perso;
		}
	}
	public function fabricate($rf)
	{
		if (!array_key_exists($rf, $this->_squad))
		{
			print("(Factory hasn't absorbed any fighter of type ".$rf.")".PHP_EOL);
			return (NULL);
		}
		else {
			print("(Factory fabricates a fighter of type ".$rf.")".PHP_EOL);
			return ($this->_squad[$rf]);
		}
	}
}
?>
