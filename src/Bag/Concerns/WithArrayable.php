<?php

declare(strict_types=1);

namespace Bag\Concerns;

use Bag\Collection;
use Illuminate\Support\Collection as LaravelCollection;
use Override;

trait WithArrayable
{
    #[Override]
    public function toArray(): array
    {
        $properties = $this->getBag();

        return self::prepareOutputValues($properties->except($this->getHidden()))->toArray();
    }

    abstract protected function getBag(): Collection;

    abstract protected static function prepareOutputValues(Collection $values): Collection;

    abstract protected function getHidden(): LaravelCollection;
}
