<?php
/**
 * User: andrew
 * Date: 28/05/2018
 * Time: 08:41.
 */

namespace TelegramBundle\DependencyInjection;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;

/**
 * Class TelegramExtension.
 */
class TelegramExtension extends Extension
{
    /**
     * Loads a specific configuration.
     *
     * @param array            $configs
     * @param ContainerBuilder $container
     *
     * @throws \Exception
     */
    public function load(array $configs, ContainerBuilder $container): void
    {
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);

        $loader = new YamlFileLoader($container, new FileLocator(__DIR__ . '/../Resources/config'));
        $loader->load('api.yml');

        $container->setParameter('telegram.api.token', $config['api']['token']);
        $container->setParameter('telegram.api.proxy', $config['api']['proxy']);
        $container->setParameter('telegram.name', $config['name']);
        $container->setParameter('telegram.api.url', $config['api']['url']);
    }
}
