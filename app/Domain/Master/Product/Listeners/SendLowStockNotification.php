<?php

namespace App\Domain\Master\Product\Listeners;

use App\Domain\Master\Product\Events\ProductStockLow;
use App\Infrastructure\Logging\ActivityLogger;

class SendLowStockNotification
{
    public function __construct(
        private ActivityLogger $logger
    ) {}

    public function handle(ProductStockLow $event)
    {
        // Send notification
        // Log activity
        $this->logger->log('Low stock alert', $event->product);
    }
}
