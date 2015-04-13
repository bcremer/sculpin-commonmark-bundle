<?php
namespace Bcremer\Sculpin\Bundle\CommonMarkBundle;

use Bcremer\Sculpin\Bundle\CommonMarkBundle\DependencyInjection\Compiler\CommonMarkExtensionPass;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class SculpinCommonMarkBundle extends Bundle
{
    const CONVERTER_NAME = 'commonmark';

    /**
     * {@inheritdoc}
     */
    public function build(ContainerBuilder $container)
    {
        $container->addCompilerPass(new CommonMarkExtensionPass());
    }
}
