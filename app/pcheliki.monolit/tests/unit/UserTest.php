<?php

namespace tests\unit;

use Entity\User;
use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{
    public function testSetNull()
    {
        $user = new User(
            null,
            null,
            null,
            null,
            null,
            null,
            null,
            null,
            null,
            null,
            false,
        );
    }
}