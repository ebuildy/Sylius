<?php

/*
 * This file is part of the Sylius package.
 *
 * (c) Paweł Jędrzejewski
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Sylius\Bundle\CoreBundle\DataFixtures\Story;

use Sylius\Bundle\CoreBundle\DataFixtures\Factory\ChannelFactoryInterface;
use Sylius\Bundle\CoreBundle\DataFixtures\Factory\PaymentMethodFactoryInterface;
use Zenstruck\Foundry\Story;

final class DefaultPaymentMethodsStory extends Story implements DefaultPaymentMethodsStoryInterface
{
    public function __construct(private PaymentMethodFactoryInterface $paymentMethodFactory)
    {
    }

    public function build(): void
    {
        $this->paymentMethodFactory::new()
            ->withCode('cash_on_delivery')
            ->withName('Cash on delivery')
            ->withChannels(['FASHION_WEB'])
            ->create()
        ;

        $this->paymentMethodFactory::new()
            ->withCode('bank_transfer')
            ->withName('Bank transfer')
            ->withChannels(['FASHION_WEB'])
            ->enabled()
            ->create()
        ;
    }
}