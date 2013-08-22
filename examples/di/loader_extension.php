<?php
/**
 * Created by IntelliJ IDEA.
 * User: joao
 * Date: 08/08/13
 * Time: 13:30
 * To change this template use File | Settings | File Templates.
 */

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\Extension\Extension;

require_once dirname(dirname(__DIR__)).'/vendor/autoload.php';

class TestExtension implements Extension
{
    public function load(array $config, ContainerBuilder $container)
    {
        var_dump($config);
    }

    public function getNamespace()
    {
        return false;
    }

    /**
     * Returns the base path for the XSD files.
     *
     * @return string The XSD base path
     *
     * @api
     */
    public function getXsdValidationBasePath()
    {
        return 'foo';
    }

    /**
     * Returns the recommended alias to use in XML.
     *
     * This alias is also the mandatory prefix to use when using YAML.
     *
     * @return string The alias
     *
     * @api
     */
    public function getAlias()
    {
        return 'test';
    }
}

$container = new ContainerBuilder();
$locator   = new FileLocator(__DIR__ . '/Resources/config');

$container->registerExtension(new TestExtension());
$loader = new YamlFileLoader($container, $locator);

$loader->load('services.yml');

$container->loadFromExtension('test', array('foo' => 'bar'));
$container->compile();



