<?php
class Tyrion extends Lannister {

	public function sleepwith($kwargs)
	{
		if (strcmp(get_class($kwargs), 'Jaime') == 0)
			print("Not even if I'm drunk !".PHP_EOL);
		if (strcmp(get_class($kwargs), 'Cersei') == 0)
			print("Not even if I'm drunk !". PHP_EOL);
		if (strcmp(get_class($kwargs), 'Sansa') == 0)
			print("Let's do this.". PHP_EOL);
	}
}
?>
