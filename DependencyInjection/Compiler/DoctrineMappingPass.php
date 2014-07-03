<?php

namespace Cubalider\Bundle\PrepaidCardBundle\DependencyInjection\Compiler;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\Definition;
use Symfony\Component\DependencyInjection\Reference;

/**
 * @author Nabel Hernandez <nabelhm@cubalider.com>
 */
class DoctrineMappingPass implements CompilerPassInterface
{
    /**
     * {@inheritDoc}
     */
    public function process(ContainerBuilder $container)
    {
        $definition = new Definition('Doctrine\ORM\Mapping\Driver\XmlDriver', array(array(
            sprintf("%s/../../../../../../prepaid-card-with-doctrine-orm/src/Cubalider/Component/PrepaidCard/Resources/config/doctrine", __DIR__)
        )));
        $definition->setPublic(false);
        $container->setDefinition('cubalider_prepaid_card.xml_driver', $definition);

        $definition = $container->getDefinition('doctrine.orm.default_metadata_driver');
        $definition->addMethodCall('addDriver', array(new Reference('cubalider_prepaid_card.xml_driver'), 'Cubalider\Component\PrepaidCard\Model'));
    }
}
