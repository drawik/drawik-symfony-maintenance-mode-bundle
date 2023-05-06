<?php

declare(strict_types=1);

namespace Drawik\MaintenanceModeBundle\DependencyInjection;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\XmlFileLoader;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;

class MaintenanceModeExtension extends Extension
{
    /**
     * {@inheritdoc}
     */
    public function load(array $configs, ContainerBuilder $container): void
    {
        $loader = new YamlFileLoader(
            $container,
            new FileLocator(__DIR__ . '/../config/')
        );
        $loader->load('maintenance_config.yaml');

        $loader = new XmlFileLoader(
            $container,
            new FileLocator(__DIR__ . '/../config/')
        );
        $loader->load('maintenance.xml');

        $configuration = new Configuration();

        $config = $this->processConfiguration($configuration, $configs);

        $container->setParameter(
            'maintenance_mode.maintenance_config.allowed_ips',
            $config['maintenance_config']['allowed_ips']
            ?? $container->getParameter('maintenance_config')['allowed_ips']
        );
        $container->setParameter(
            'maintenance_mode.maintenance_config.enabled',
            $config['maintenance_config']['enabled']
            ?? $container->getParameter('maintenance_config')['enabled']
        );

        $container->setParameter(
            'maintenance_mode.maintenance_config.lock_file_path',
            $container->getParameter('maintenance_config')['lock_file_path']
        );
    }
}
