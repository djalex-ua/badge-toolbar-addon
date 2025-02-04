<?php
/**
 * Copyright © test All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Badge\ToolBarRestrictions\Plugin\Smile\DebugToolbar\Helper;

use Magento\Framework\App\RequestInterface;

class Config
{
    private const TOOLBAR_RESTRICTED_URLS = [
        '#^/rest/.+/V1/products$#', // matches "/rest/{anything}/V1/products"
        '#(^|/)script(/|$)#' // matches "/script/"
    ];

    public function __construct(
        private readonly RequestInterface $request
    ) {
    }

    public function afterIsEnabledInCurrentArea(
        \Smile\DebugToolbar\Helper\Config $subject,
        $result
    ) {
        $currentUri = $this->request->getRequestUri();
        foreach (self::TOOLBAR_RESTRICTED_URLS as $pattern) {
            if (preg_match($pattern, $currentUri)) {
                return false;
            }
        }

        return $result;
    }
}
