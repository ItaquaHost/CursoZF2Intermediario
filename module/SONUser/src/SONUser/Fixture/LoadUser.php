<?php

namespace SONUser\Fixture;

use Doctrine\Common\DataFixtures\AbstractFixture,
    Doctrine\Common\Persistence\ObjectManager;
use SONUser\Entity\User;

class LoadUser extends AbstractFixture {

    /**
     * 
     * @return \SONUser\Entity\User
     */
    public function load(ObjectManager $manager) {
        
        $user = new User();        
        $user->setNome("Thiago");
        $user->setEmail("thiago@itaquahost.com.br");
        $user->setPassword(123456);
        $user->setActive(true);
        
        $manager->persist($user);
        $manager->flush();
    }

}
