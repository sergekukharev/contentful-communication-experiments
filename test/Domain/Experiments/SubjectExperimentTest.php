<?php

namespace Sergekukharev\CCP\Domain\Experiments;

use PHPUnit\Framework\TestCase;

class SubjectExperimentTest extends TestCase
{

    //TODO validates experiment name
    public function testGetName()
    {
        $experiment = new SubjectExperiment('Experiment-name', new ExperimentDistribution(), 'subject for variation B');

        self::assertEquals('Experiment-name', $experiment->getName());
    }

    public function testGetDistribution()
    {
        $experimentDistribution = new ExperimentDistribution(75, 25);
        $experiment = new SubjectExperiment('Experiment-name', $experimentDistribution, 'subject for variation B');

        self::assertTrue($experiment->getDefaultDistribution()->equalsTo(new ExperimentDistribution(75, 25)));
    }

    public function testGetSubjectVariation()
    {
        $experiment = new SubjectExperiment('Experiment-name', new ExperimentDistribution(), 'subject for variation B');

        self::assertEquals('subject for variation B', $experiment->getSubjectForB());
    }
}
