<?php

namespace SimpleBudgetBundle\DataFixtures;

use SimpleBudgetBundle\Entity\User;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

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
            ->setPassword(
                $this->container->get('security.password_encoder')
                    ->encodePassword($user, self::DEFAULT_PASSWORD)
            )
            ->setSalt(uniqid(mt_rand(), true))
            ->setEmail(self::DEFAULT_USERNAME.'@gmail.com')
            ->setEnabled(true)
            ->setRoles([$user::ROLE_DEFAULT]);

        $manager->persist($user);
        $manager->flush();
    }
}
