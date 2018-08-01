<?php

namespace Sergekukharev\CCP\Domain;

use PHPUnit\Framework\TestCase;

class EmailTest extends TestCase
{
    public function testHasSubjectLine()
    {
        $email = new Email('this is subject');

        self::assertEquals('this is subject', $email->getSubject());
    }
}
