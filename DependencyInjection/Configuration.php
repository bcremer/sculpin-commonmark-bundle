<?php
namespace Bcremer\Sculpin\Bundle\CommonMarkBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritdoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder;

        $rootNode = $treeBuilder->root('sculpin_commonmark');

        $rootNode
            ->children()
                ->arrayNode('extensions')
                    ->defaultValue(['md', 'mdown', 'mkdn', 'markdown'])
                    ->prototype('scalar')->end()
                ->end()
            ->end();

        return $treeBuilder;
    }
}
