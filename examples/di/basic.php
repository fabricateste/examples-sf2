<?php

use Symfony\Component\DependencyInjection\ContainerBuilder;

require_once dirname(dirname(__DIR__)).'/vendor/autoload.php';

class Usuario
{
	
	private $firstName;
	
	private $lastName;
	
	public $age;

	public function __construct($name)
	{
		$this->firstName = $name;
	}
	
	public function setLastName($lastName)
	{
		$this->lastName = $lastName;
	}
	
	public function __toString()
	{
		$out = $this->firstName . ' ' .$this->lastName;
		
		if (null !== $this->age) {
			$out .= ' ' . $this->age;
		}
		
		return $out . "\n";
	}
}


$usuario = new Usuario('Joao');
$usuario->setLastName('Batista');

echo $usuario;

$containerBuilder = new ContainerBuilder();
$definition = $containerBuilder->register('user', 'Usuario');
$definition->addArgument('Ramon')
           ->addMethodCall('setLastName', array('Henrique'))
		   ->setProperty('age', 25);

echo $containerBuilder->get('user');
