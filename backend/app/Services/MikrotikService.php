<?php

namespace App\Services;

use App\Models\AuditLog;
use App\Models\Router;

class MikrotikService
{
    /**
     * Baseline integration stub.
     * NOTE: No real credentials. Implement actual API client later.
     */
    public function ping(Router $router): array
    {
        $result = [
            'router_id' => $router->id,
            'host' => $router->host,
            'ok' => true,
            'message' => 'stubbed',
        ];

        AuditLog::create([
            'company_id' => $router->company_id,
            'user_id' => auth()->id(),
            'action' => 'mikrotik.ping',
            'entity_type' => 'routers',
            'entity_id' => $router->id,
            'meta' => $result,
        ]);

        return $result;
    }
}
