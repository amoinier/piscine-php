<?php
class Color
{
	public $red = 0;
	public $green = 0;
	public $blue = 0;

	public static $verbose = False;

	public function __construct(array $kwargs)
	{
		if (array_key_exists('rgb', $kwargs))
		{
			$this->red = intval($kwargs['rgb'] & 255);
			$this->green = intval(($kwargs['rgb'] >> 8) & 255);
			$this->blue = intval(($kwargs['rgb'] >> 16) & 255);
		}
		else if (array_key_exists('red', $kwargs) && array_key_exists('green', $kwargs) && array_key_exists('blue', $kwargs))
		{
			$this->red = intval($kwargs['red']);
			$this->green = intval($kwargs['green']);
			$this->blue = intval($kwargs['blue']);
		}
		if ($this::$verbose == True)
			print($this->__tostring.' constructed.'.PHP_EOL);
		return ;
	}
	public function __destruct()
	{
		if ($this::$verbose == True)
			print($this->__tostring.' destructed.'.PHP_EOL);
		return ;
	}
	function __tostring()
	{
		return 'Color( red: '.(strlen($this->red) == 2 ? " " : (strlen($this->red) == 1 ? "  " : "")).$this->red.', green: '.
		(strlen($this->green) == 2 ? " " : (strlen($this->green) == 1 ? "  " : "")).$this->green.', blue: '.
		(strlen($this->blue) == 2 ? " " : (strlen($this->blue) == 1 ? "  " : "")).$this->blue.' )';
	}
	public static function doc()
	{
		return (file_get_contents("Color.doc.txt"));
	}
	public function add(Color $color)
	{
		return (new Color(array('red' => $this->red + $color->red, 'green' => $this->green + $color->green, 'blue' => $this->blue + $color->blue)));
	}
	public function sub(Color $color)
	{
		return (new Color(array('red' => $this->red - $color->red, 'green' => $this->green - $color->green, 'blue' => $this->blue - $color->blue)));
	}
	public function mult($f)
	{
		return (new Color(array('red' => $this->red * $f, 'green' => $this->green * $f, 'blue' => $this->blue * $f)));
	}
}
?>
