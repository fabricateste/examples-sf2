<?php

use Symfony\Component\DependencyInjection\ContainerBuilder;

require_once dirname(dirname(__DIR__)).'/vendor/autoload.php';


$containerBuilder = new ContainerBuilder();
$definition = $containerBuilder->register('loader', 'Loader')
							->setFile(__DIR__.'/stubs/loader.php');


var_dump($containerBuilder->get('loader'));
