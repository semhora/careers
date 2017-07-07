<?php

namespace Service;

use Entity\User;

class UserService extends AbstractService
{

    public function save($request)
    {
        $user = new User();

        $user->setUser($request['user'])
            ->setPass($request['pass']);

        $this->getEntityManager()->persist($user);
        $this->getEntityManager()->flush();

        die("id: {$user->getId()}");
    }

    public function getUserByLogin($user, $pass)
    {
        return $this->getEntityManager()->getRepository('Entity\User')->findOneBy([
            'user' => $user,
            'pass' => $pass
        ]);
    }

}
