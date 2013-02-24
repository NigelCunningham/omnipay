<?php

/*
 * This file is part of the Omnipay package.
 *
 * (c) Adrian Macneil <adrian@adrianmacneil.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Omnipay\AuthorizeNet\Message;

/**
 * Authorize.Net AIM Authorize Request
 */
class AIMAuthorizeRequest extends AbstractRequest
{
    protected $action = 'AUTH_ONLY';

    public function getData()
    {
        $this->validate(array('amount', 'card'));
        $this->card->validate();

        $data = $this->getBaseData();
        $data['x_customer_ip'] = $this->getClientIp();
        $data['x_card_num'] = $this->card->getNumber();
        $data['x_exp_date'] = $this->card->getExpiryDate('my');
        $data['x_card_code'] = $this->card->getCvv();

        if ($this->testMode) {
            $data['x_test_request'] = 'TRUE';
        }

        return array_merge($data, $this->getBillingData());
    }
}
