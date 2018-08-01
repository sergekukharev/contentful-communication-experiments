<?php

namespace Sergekukharev\CCP\Domain\Experiments;

use PHPUnit\Framework\TestCase;

class ExperimentDistributionTest extends TestCase
{
    public function test100OnAByDefault()
    {
        $distribution = new ExperimentDistribution();

        self::assertEquals(100, $distribution->getVariationA());
        self::assertEquals(0, $distribution->getVariationB());
    }

    public function testCanSetTheDistribution()
    {
        $distribution = new ExperimentDistribution(75, 25);

        self::assertEquals(75, $distribution->getVariationA());
        self::assertEquals(25, $distribution->getVariationB());
    }

    public function testSummaryOfVariationsShouldBe100()
    {
        $this->expectException(\InvalidArgumentException::class);

        new ExperimentDistribution(30, 20);
    }

    public function testCanProvideOnlyADistribution()
    {
        $distribution = new ExperimentDistribution(60);

        self::assertEquals(60, $distribution->getVariationA());
        self::assertEquals(40, $distribution->getVariationB());
    }

    public function testCanBeEqualToOtherDistirubtion()
    {
        $experimentDistribution = new ExperimentDistribution();
        self::assertTrue($experimentDistribution->equalsTo(new ExperimentDistribution()));
    }

    public function testCanBeNotEqualToOtherDistirubtion()
    {
        $experimentDistribution = new ExperimentDistribution();
        self::assertFalse($experimentDistribution->equalsTo(new ExperimentDistribution(10, 90)));
    }
}
