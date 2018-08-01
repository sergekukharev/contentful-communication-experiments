<?php

namespace Sergekukharev\CCP\Contentful;

use Contentful\Delivery\Client;

final class ContentfulClient
{
	private $deliveryClient;

	public function __construct(Client $deliveryClient)
	{
		$this->deliveryClient = $deliveryClient;
	}

	public function ping()
	{
		try{
			$result = $this->deliveryClient->getContentTypes();
		} catch (\Exception $exception) {
			return false;
		}

		return true;
	}
}
