<?php

namespace SimpleBudgetBundle\DataFixtures;

use Symfony\Component\DependencyInjection\ContainerInterface;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use SimpleBudgetBundle\Entity\User;
use SimpleBudgetBundle\Component\Core\Utility\Enum\RoleEnum;

class UserFixtures extends Fixture
{
    const DEFAULT_USERNAME = 'dev';
    const DEFAULT_PASSWORD = 'dev';

    private $container;

    /**
     * @param ContainerInterface $container
     */
    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    /**
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $user = new User();
        $user->setUsername(self::DEFAULT_USERNAME)
            ->setEmail(self::DEFAULT_USERNAME.'@gmail.com')
            ->setEnabled(true)
            ->addRole(RoleEnum::ROLE_USER)
            ->setPassword(
                $this->container->get('security.password_encoder')
                    ->encodePassword($user, self::DEFAULT_PASSWORD)
            );

        $manager->persist($user);
        $manager->flush();
    }
}
