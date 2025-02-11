<?php

namespace Badge\ToolBarRestrictions\Rewrite\Smile\Block\Zone;

use Smile\DebugToolbar\Block\Zone\Cache as BaseCache;

class Cache extends BaseCache
{
    /**
     * Get the cache info.
     */
    public function getCacheInfo(): array
    {
        $config = $this->deployConfig->get('cache');
        if (!$config || !is_array($config)) {
            return []; // Return an empty array instead of a string
        }

        return $config;
    }
}