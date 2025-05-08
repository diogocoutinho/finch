<?php

use App\Domain\Entities\User;
use PHPUnit\Framework\TestCase;

class UserEntityTest extends TestCase
{
    public function testUserIsManager()
    {
        $user = new User("João", "joao@email.com", "12345678900", "manager");
        $this->assertTrue($user->isManager());
    }
}
