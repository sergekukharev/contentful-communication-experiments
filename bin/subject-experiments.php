<?php

use Contentful\Delivery\Client;
use Sergekukharev\CCP\Contentful\ContentfulClient;

require __DIR__ . '/../bootstrap.php';

$deliveryClient = new Client(
    getenv('CONTENTFUL_ACCESS_TOKEN'),
    getenv('CONTENTFUL_SPACE_ID')
);


$client = new ContentfulClient($deliveryClient);

$activeSubjectExperiments = $client->getActiveSubjectExperiments();

echo "Here's a list of Subject Experiments: \n";

echo sprintf(
    "|%s|%s|%s|\n",
    str_pad('Name', 40, ' ', STR_PAD_BOTH),
    str_pad('Distribution', 20, ' ', STR_PAD_BOTH),
    str_pad('Subject in B', 80, ' ', STR_PAD_BOTH)
);

echo str_repeat('-', 144) . "\n";

foreach ($activeSubjectExperiments as $experiment) {
    $distribution = sprintf(
        'A: %s; B: %s',
        $experiment->getDefaultDistribution()->getVariationA(),
        $experiment->getDefaultDistribution()->getVariationA()
    );

    $experimentName = sprintf(str_pad($experiment->getName(), 40, ' ', STR_PAD_BOTH));
    $distribution = sprintf(str_pad($distribution, 20, ' ', STR_PAD_BOTH));
    $subjectForB = sprintf(str_pad($experiment->getSubjectForB(), 80, ' ', STR_PAD_BOTH));
    echo sprintf(
        "|%s|%s|%s|\n",
        $experimentName,
        $distribution,
        $subjectForB
    );
}
