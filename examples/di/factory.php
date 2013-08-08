<?php
use Symfony\Component\DependencyInjection\ContainerBuilder;

require_once dirname(dirname(__DIR__)).'/vendor/autoload.php';

class Pager 
{	

}

class FactoryBenga
{
	public static function factory()
	{
		echo "Ramon \n";
	}
}

$containerBuilder = new ContainerBuilder();
$definition = $containerBuilder->register('factory', 'Pager');
$definition->setFactoryClass('FactoryBenga')
		  ->setFactoryMethod('factory');

var_dump($containerBuilder->get('factory'));