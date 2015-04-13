<?php

namespace Bcremer\Sculpin\Bundle\CommonMarkBundle\DependencyInjection\Compiler;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\Reference;

class CommonMarkExtensionPass implements CompilerPassInterface
{
    /**
     * {@inheritdoc}
     */
    public function process(ContainerBuilder $container)
    {
        if (false === $container->hasDefinition('sculpin_commonmark.environment')) {
            return;
        }

        $definition = $container->getDefinition('sculpin_commonmark.environment');

        foreach ($container->findTaggedServiceIds('sculpin_commonmark.extension') as $id => $attributes) {
            $definition->addMethodCall(
                'addExtension',
                [new Reference($id)]
            );
        }
    }
}
