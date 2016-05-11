
<?php
class Vertex
{
	private $_x = 0;
	private $_y = 0;
	private $_z = 0;
	private $_w = 1.0;
	private $_color;

	public static $verbose = False;

	public function __construct(array $kwargs)
	{
		if (array_key_exists('x', $kwargs) && array_key_exists('y', $kwargs) && array_key_exists('z', $kwargs))
		{
			$this->_x = number_format($kwargs['x'], 2);
			$this->_y = number_format($kwargs['y'], 2);
			$this->_z = number_format($kwargs['z'], 2);
			if (array_key_exists('w', $kwargs))
				$this->_w = number_format($kwargs['w'], 2);
			if (array_key_exists('color', $kwargs))
				$this->_color = $kwargs['color'];
			else
				$this->_color = new Color(array('red' => 255, 'green' => 255, 'blue' => 255));
		}
		if ($this::$verbose == True)
			print($this.' constructed.'.PHP_EOL);
		return ;
	}
	public function __destruct()
	{
		if ($this::$verbose == True)
			print($this.' destructed.'.PHP_EOL);
		return ;
	}
	function __tostring()
	{
		return ('Vertex( x: '.$this->_x.', y: '.$this->_y.', z:'.$this->_z.', w:'.number_format($this->_w, 2).', '.$this->_color.' )');
	}
	public static function doc()
	{
		return (file_get_contents("Vertex.doc.txt"));
	}
}
?>
