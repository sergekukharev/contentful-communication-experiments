<?php

namespace Sergekukharev\CCP\Integration\Contentful;

use Contentful\Delivery\Client;
use PHPUnit\Framework\TestCase;
use Sergekukharev\CCP\Contentful\ContentfulClient;
use Sergekukharev\CCP\Domain\Experiments\ExperimentInterface;

class ContentfulClientTest extends TestCase
{
	/** @var ContentfulClient */
	private $client;

	public function setUp()
	{
		$deliveryClient = new Client(
			getenv('CONTENTFUL_ACCESS_TOKEN'),
			getenv('CONTENTFUL_SPACE_ID')
		);

		$this->client = new ContentfulClient($deliveryClient);
	}

	public function testCanPingContentful()
	{
		self::assertTrue($this->client->ping());
	}

	public function testPingFailsWithWrongConfiguration()
	{
		$deliveryClient = new Client(
			'wrong access token',
			getenv('CONTENTFUL_SPACE_ID')
		);

		$misconfiguredClient = new ContentfulClient($deliveryClient);

		self::assertFalse($misconfiguredClient->ping());
	}

    public function testCanGetActiveSubjectExperiments(): void
    {
        $activeExperiments = $this->client->getActiveSubjectExperiments();

        self::assertGreaterThan(0, $activeExperiments);

        foreach ($activeExperiments as $experiment){
            self::assertInstanceOf(ExperimentInterface::class, $experiment);
        }
    }
}
