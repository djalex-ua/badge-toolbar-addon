<?php

namespace Badge\ToolBarRestrictions\Rewrite\Smile\Block\Zone;

use Smile\DebugToolbar\Block\Zone\Cache as BaseCache;

class Server extends BaseCache
{
    /**
     * Get the session info.
     */
    public function getSessionInfo(): array
    {
        $config = $this->deployConfig->get('session');
        if (!$config || !is_array($config)) {
            return [];
        }

        return $config;
    }
}
