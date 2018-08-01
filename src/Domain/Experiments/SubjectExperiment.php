<?php

namespace Sergekukharev\CCP\Domain\Experiments;

class SubjectExperiment implements ExperimentInterface
{
    private $name;
    private $distribution;
    private $subjectForB;

    public function __construct(string $name, ExperimentDistribution $distribution, string $subjectForB)
    {
        $this->name = $name;
        $this->distribution = $distribution;
        $this->subjectForB = $subjectForB;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getDefaultDistribution(): ExperimentDistribution
    {
        return $this->distribution;
    }

    public function getSubjectForB(): string
    {
        return $this->subjectForB;
    }
}
