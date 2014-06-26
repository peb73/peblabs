<?php
/**
 * Created by PhpStorm.
 * User: pierre-emmanueboiteau
 * Date: 23/06/2014
 * Time: 22:58
 */

namespace peb\HomeBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface{

    /**
     * {@inheritDoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('pebHome');

        return $treeBuilder;
    }
} 