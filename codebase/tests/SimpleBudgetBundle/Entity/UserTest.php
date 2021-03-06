<?php

namespace Tests\SimpleBudgetBundle\Entity;

use SimpleBudgetBundle\Entity\User;
use SimpleBudgetBundle\Component\Core\Utility\Enum\RoleEnum;

class UserTest extends EntityBaseTestCase
{
    protected function setUp()
    {
        $this->model = new User();
        $this->model->setUsername(User::class);
    }

    /**
     * @test
     */
    public function id()
    {
        $this->setAndGetErTest('id', 1294);
    }

    /**
     * @test
     */
    public function username()
    {
        $this->setAndGetErTest('username', 'username');
    }

    /**
     * @test
     */
    public function password()
    {
        $this->setAndGetErTest('password', 'password');
    }

    /**
     * @test
     */
    public function salt()
    {
        $this->assertEquals(null, $this->model->getSalt());
    }

    /**
     * @test
     */
    public function email()
    {
        $this->setAndGetErTest('email', 'email@gmail.com');
    }

    /**
     * @test
     */
    public function enabled()
    {
        $this->booleanTest('enabled', true);
    }

    /**
     * @test
     * @group user_roles
     */
    public function roles()
    {
        $this->arrayCollectionsTest('roles', RoleEnum::ROLE_ADMIN);
    }

    /**
     * @test
     */
    public function hasRole()
    {
        $roles = $this->model->addRole((RoleEnum::ROLE_ADMIN));

        $this->assertEquals(true, $this->model->hasRole(RoleEnum::ROLE_ADMIN));
    }

    /**
     * @test
     */
    public function unserialize()
    {
        $id = 1988;
        $username = 'username';
        $password = 'password';
        $email = 'email';
        $boolean = true;

        $john = new User();

        $john->setId($id)
            ->setUsername($username)
            ->setPassword($password)
            ->setEmail($email)
            ->setEnabled($boolean)
            ->addRole(RoleEnum::ROLE_ADMIN);

        $jack = new User();
        $jack->unserialize($john->serialize());

        $this->assertEquals($john->getId(), $jack->getId());
        $this->assertEquals($username, $jack->getUsername());
        $this->assertEquals($password, $jack->getPassword());
        $this->assertEquals($email, $jack->getEmail());
        $this->assertEquals($boolean, $jack->isEnabled());
        $this->assertEquals($john->getRoles(), $jack->getRoles());
    }

    /**
     * @test
     */
    public function eraseCredentials()
    {
        $attrName = 'plainPassword';
        $newValue = rand(1, 100000);

        $reflexionModel = new \ReflectionClass($this->model);
        $property = $reflexionModel->getProperty($attrName);
        $property->setAccessible(true);
        $property->setValue($this->model, $newValue);

        $this->model->eraseCredentials();
        $this->assertEquals($property->getValue($this->model), null);

        return $reflexionModel;
    }
}
