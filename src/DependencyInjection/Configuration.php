<?php
/**
 * User: andrew
 * Date: 28/05/2018
 * Time: 08:44.
 */

namespace TelegramBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * Class Configuration.
 */
class Configuration implements ConfigurationInterface
{
    /**
     * Generates the configuration tree builder.
     *
     * @return TreeBuilder The tree builder
     * @psalm-suppress PossiblyUndefinedMethod
     */
    public function getConfigTreeBuilder(): TreeBuilder
    {
        $treeBuilder = new TreeBuilder('telegram');
        $rootNode = $treeBuilder->getRootNode();

        $rootNode->children()
            ->scalarNode('name')->isRequired()->end()
            ->scalarNode('username')->isRequired()->end()
            ->arrayNode('api')->addDefaultsIfNotSet()
                ->children()
                    ->scalarNode('url')->isRequired()->end()
                    ->scalarNode('token')->isRequired()->end()
                    ->scalarNode('proxy')->defaultValue('')->end()
            ->end()
        ->end();

        return $treeBuilder;
    }
}
