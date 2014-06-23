<?php

namespace peb\velibBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * This is the class that validates and merges configuration from your app/config files
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html#cookbook-bundles-extension-config-class}
 */
class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritDoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('pebvelib');

        $rootNode
            ->children()
                ->arrayNode('matin')
                    ->children()
                        ->scalarNode('lat')
                        ->cannotBeEmpty()
                        ->end()
                        ->scalarNode('lng')
                        ->cannotBeEmpty()
                        ->end()
                    ->end()
                ->end()
                ->arrayNode('soir')
                    ->children()
                        ->scalarNode('lat')
                        ->cannotBeEmpty()
                        ->end()
                        ->scalarNode('lng')
                        ->cannotBeEmpty()
                        ->end()
                    ->end()
                ->end()
                ->scalarNode('google_api_key')
                ->cannotBeEmpty()
                ->end()
                ->scalarNode('jcdecault_api_key')
                ->cannotBeEmpty()
                ->end()
            ->end();

        return $treeBuilder;
    }
}
