<?php

declare(strict_types=1);

namespace Drawik\MaintenanceModeBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{

    /**
     * @inheritDoc
     */
    public function getConfigTreeBuilder(): TreeBuilder
    {
        $treeBuilder = new TreeBuilder('maintenance_mode');

        $rootNode = $treeBuilder->getRootNode();

        $rootNode
            ->children()
            ->arrayNode('maintenance_config')
            ->children()
            ->variableNode('allowed_ips')->end()
            ->scalarNode('enabled')->end()
            ->end();

        return $treeBuilder;
    }
}
