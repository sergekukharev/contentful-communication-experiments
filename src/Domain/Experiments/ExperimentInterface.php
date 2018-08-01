<?php

namespace Sergekukharev\CCP\Domain\Experiments;

use Sergekukharev\CCP\Domain\Experiments\ExperimentDistribution;

interface ExperimentInterface
{
    public function getName(): string;

    public function getDefaultDistribution(): ExperimentDistribution;
}
