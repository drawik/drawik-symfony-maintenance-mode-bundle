<?php

declare(strict_types=1);

namespace Drawik\MaintenanceModeBundle\Event;

use Symfony\Component\HttpFoundation\IpUtils;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Event\RequestEvent;

class MaintenanceListener
{
    public function __construct(
        private readonly int $enabled,
        private readonly array $allowedIps,
        private readonly string $filePath
    ) {
    }

    public function onKernelRequest(RequestEvent $requestEvent): void
    {
        if (!$requestEvent->isMainRequest()) {
            return;
        }

        if (!$this->enabled) {
            return;
        }

        if (IpUtils::checkIp($requestEvent->getRequest()->getClientIp(), $this->allowedIps ?? [])) {
            return;
        }

        if (!file_exists($this->filePath)) {
            return;
        }

        $requestEvent->setResponse(
            new Response('Maintenance mode.', Response::HTTP_SERVICE_UNAVAILABLE)
        );
        $requestEvent->stopPropagation();
    }
}
