<?php

/*
 * This file is part of the Sylius package.
 *
 * (c) Sylius Sp. z o.o.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Sylius\Bundle\UiBundle\Registry;

trigger_deprecation(
    'sylius/ui-bundle',
    '1.14',
    'The "%s" class is deprecated and will be removed in Sylius 2.0',
    TemplateBlock::class,
);
final class TemplateBlock extends Block
{
    public function __construct(
        string $name,
        string $eventName,
        private ?string $template,
        ?array $context,
        ?int $priority,
        ?bool $enabled,
    ) {
        parent::__construct($name, $eventName, $context, $priority, $enabled);
    }

    public function getTemplate(): string
    {
        if ($this->template === null) {
            throw new \DomainException(sprintf(
                'There is no template defined for block "%s" in event "%s".',
                $this->name,
                $this->eventName,
            ));
        }

        return $this->template;
    }

    public function overwriteWith(Block $block): self
    {
        if (!$block instanceof self) {
            throw new \DomainException(sprintf(
                'Trying to overwrite template block "%s" with block of different type "%s".',
                $this->name,
                get_class($block),
            ));
        }

        if ($this->name !== $block->name) {
            throw new \DomainException(sprintf(
                'Trying to overwrite block "%s" with block "%s".',
                $this->name,
                $block->name,
            ));
        }

        return new self(
            $this->name,
            $block->eventName,
            $block->template ?? $this->template,
            $block->context ?? $this->context,
            $block->priority ?? $this->priority,
            $block->enabled ?? $this->enabled,
        );
    }
}
