<?php

namespace Sergekukharev\CCP\Domain\Experiments;

use Webmozart\Assert\Assert;

class ExperimentDistribution
{

    private $variationA = 100;
    private $variationB = 0;

    public function __construct(int $variationA = 100, int $variationB = null)
    {
        if ($variationB === null) {
            $variationB = 100 - $variationA;
        }

        Assert::same(100, $variationA + $variationB);

        $this->variationA = $variationA;
        $this->variationB= $variationB;
    }

    public function getVariationA(): int
    {
        return $this->variationA;
    }

    public function getVariationB(): int
    {
        return $this->variationB;
    }

    public function equalsTo(self $other): bool
    {
        return $this->getVariationA() === $other->getVariationA();
    }
}
