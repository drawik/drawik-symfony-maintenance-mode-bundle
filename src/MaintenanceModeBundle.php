<?php

declare(strict_types=1);

namespace Drawik\MaintenanceModeBundle;


use Drawik\MaintenanceModeBundle\DependencyInjection\MaintenanceModeExtension;
use Symfony\Component\DependencyInjection\Extension\ExtensionInterface;
use Symfony\Component\HttpKernel\Bundle\AbstractBundle;

class MaintenanceModeBundle extends AbstractBundle
{
    public function getContainerExtension(): ?ExtensionInterface
    {
        return new MaintenanceModeExtension();
    }
}
