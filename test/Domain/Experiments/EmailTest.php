<?php

namespace Sergekukharev\CCP\Domain\Experiments;

use PHPUnit\Framework\TestCase;
use Sergekukharev\CCP\Domain\Email;

class EmailTest extends TestCase
{
    public function testHasSubjectLine()
    {
        $email = new Email('this is subject');

        self::assertEquals('this is subject', $email->getSubject());
    }
}
