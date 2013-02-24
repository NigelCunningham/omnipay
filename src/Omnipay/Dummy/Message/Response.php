<?php

/*
 * This file is part of the Omnipay package.
 *
 * (c) Adrian Macneil <adrian@adrianmacneil.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Omnipay\Dummy\Message;

use Omnipay\Common\Message\AbstractResponse;

/**
 * Dummy Response
 */
class Response extends AbstractResponse
{
    public function isSuccessful()
    {
        return true;
    }

    public function getGatewayReference()
    {
        return isset($this->data['reference']) ? $this->data['reference'] : null;
    }
}
