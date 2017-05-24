<?php 
class A
{
	public function hello()
	{
		echo "bonjour World !";
	}
}

$a = new A;
$method = 'hello';

$a->$method(); // Affiche : hello world !
