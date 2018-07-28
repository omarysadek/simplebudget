<?php

namespace Tests\SimpleBudgetBundle\Entity;

use PHPUnit\Framework\TestCase;

use SimpleBudgetBundle\Entity\User;

class UserTest extends TestCase
{
    /**
     * @test
     */
    public function unserialize()
    {
        $username = 'username';
        $password = 'password';
        $salt     = 'salt';
        $email    = 'email';
        $boolean  = true;
        $roles    = User::ROLE_DEFAULT;

        $john = new User();

        $john->setUsername($username)
            ->setPassword($password)
            ->setSalt($salt)
            ->setEmail($email)
            ->setEnabled($boolean)
            ->setRoles([$roles]);

        $jack = new User();
        $jack->unserialize($john->serialize());


        $this->assertEquals($john->getId(), $jack->getId());
        $this->assertEquals($username, $jack->getUsername());
        $this->assertEquals($password, $jack->getPassword());
        $this->assertEquals($salt, $jack->getSalt());
        $this->assertEquals($email, $jack->getEmail());
        $this->assertEquals($boolean, $jack->isEnabled());
        $this->assertEquals([$roles], $jack->getRoles());
    }
}
