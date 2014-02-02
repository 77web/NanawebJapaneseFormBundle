<?php

namespace Nanaweb\JapaneseFormBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Loader;

class NanawebJapaneseFormExtension extends Extension
{
    /**
     * {@inheritDoc}
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);

        $loader = new Loader\YamlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load('services.yml');
        
        if (in_array('twig', $container->getParameter('templating.engines'))) {
            $loader->load('twig.yml');
            $formResources = $container->getParameter('twig.form.resources');
            $additionalFormResources = $container->getParameter('nanaweb_japaneseform.form_resources');
            foreach ($additionalFormResources as $resource) {
                $formResources[] = $resource;
            }
            $container->setParameter('twig.form.resources', $formResources);
        }
    }
}
