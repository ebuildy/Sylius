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

namespace Sylius\Bundle\CoreBundle\DataFixtures\Factory;

use Sylius\Component\Customer\Model\CustomerInterface;
use Zenstruck\Foundry\ModelFactory;

/**
 * @mixin ModelFactory
 */
trait FemaleTrait
{
    public function female(): self
    {
        return $this->addState(['gender' => CustomerInterface::FEMALE_GENDER]);
    }
}