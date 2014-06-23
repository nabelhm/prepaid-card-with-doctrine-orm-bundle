<?php

namespace Cubalider\Bundle\PrepaidCardBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Cubalider\Bundle\PrepaidCardBundle\DependencyInjection\Compiler\DoctrineMappingPass;

/**
 * @author Nabel Hernandez <nabelhm@cubalider.com>
 */
class CubaliderPrepaidCardBundle extends Bundle
{
    public function build(ContainerBuilder $container)
    {
        parent::build($container);

        $container->addCompilerPass(new DoctrineMappingPass());
    }
}
