<?php

namespace Sergekukharev\CCP\Domain;

class Email
{
    private $subject;

    public function __construct(string $subject)
    {
        $this->subject = $subject;
    }

    public function getSubject(): string
    {
        return $this->subject;
    }
}
