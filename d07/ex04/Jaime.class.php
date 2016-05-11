<?php
class Jaime extends Lannister {

	public function sleepwith($ok)
	{
		if (strcmp(get_class($ok), 'Tyrion') == 0)
			print("Not even if I'm drunk !".PHP_EOL);
		if (strcmp(get_class($ok), 'Cersei') == 0)
			print("With pleasure, but only in a tower in Winterfell, then.". PHP_EOL);
		if (strcmp(get_class($ok), 'Sansa') == 0)
			print("Let's do this.". PHP_EOL);
	}
}
?>
