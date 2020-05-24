<?php


namespace App\Fixture;

use App\Entity\Security\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixture extends Fixture
{
    /**
     * @var UserPasswordEncoderInterface
     */
    private $encoder;

    /**
     * FormAction constructor.
     * @param UserPasswordEncoderInterface $encoder
     */
    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }

    public function load(ObjectManager $manager)
    {
        $user = new User();

        $user->setEnabled(1);
        $user->setName('Mayte');
        $user->setLastName('Menderico');
        $user->setRoles(['ROLE_ADMIN']);
        $user->setUsername('mayte');
        $user->setEmail('admin@mayte.com');

        $user->setPassword(
            $this->encoder->encodePassword($user, '123')
        );
        $manager->persist($user);
        $manager->flush();
    }

}