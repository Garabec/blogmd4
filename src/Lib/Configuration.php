<?php

namespace Lib;

use Symfony\Component\Config\Definition\ConfigurationInterface;
use Symfony\Component\Config\Definition\Builder\TreeBuilder;

class Configuration implements ConfigurationInterface
{
    /**
     * @return TreeBuilder
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('connection');
        $rootNode->children()
            ->scalarNode('name')
            ->isRequired()
            ->cannotBeEmpty()
            ->end()
            ->scalarNode('host')
            ->isRequired()
            ->cannotBeEmpty()
            ->end()
            ->scalarNode('driver')
            ->isRequired()
            ->cannotBeEmpty()
            ->end()
            ->scalarNode('username')
            ->defaultTrue()
            ->end();
        return $treeBuilder;
    }
}