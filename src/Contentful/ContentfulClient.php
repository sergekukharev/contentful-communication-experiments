<?php

namespace Sergekukharev\CCP\Contentful;

use Contentful\Delivery\Client;
use Contentful\Delivery\Query;
use Contentful\Delivery\Resource\Entry;
use Sergekukharev\CCP\Domain\Experiments\ExperimentDistribution;
use Sergekukharev\CCP\Domain\Experiments\SubjectExperiment;

final class ContentfulClient
{
    private const SUBJECT_EXPERIMENT = 'experimentSubjectLine';
    private $deliveryClient;

    public function __construct(Client $deliveryClient)
    {
        $this->deliveryClient = $deliveryClient;
    }

    public function ping(): bool
    {
        try {
            $this->deliveryClient->getContentTypes();
        } catch (\Exception $exception) {
            return false;
        }

        return true;
    }

    /**
     * @return SubjectExperiment[]
     */
    public function getActiveSubjectExperiments(): array
    {
        $query = new Query();
        $query->setContentType(self::SUBJECT_EXPERIMENT);

        $result = $this->deliveryClient->getEntries($query);

        /** @var Entry[] $rawExperiments */
        $rawExperiments = $result->getItems();
        $experiments = [];

        foreach ($rawExperiments as $rawExperiment) {
            $distributionA = $rawExperiment['startingExperimentDistribution']['distributionA'];
            $distributionB = $rawExperiment['startingExperimentDistribution']['distributionB'];

            $experiments[] = new SubjectExperiment(
                $rawExperiment['experimentName']['name'],
                new ExperimentDistribution($distributionA, $distributionB),
                $rawExperiment['subjectLineInBVariation']
            );
        }

        return $experiments;
    }
}
