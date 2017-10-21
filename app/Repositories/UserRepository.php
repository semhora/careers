<?php
namespace App\Repositories;

use App\Entities\User;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityRepository;

class UserRepository extends EntityRepository
{
    public function registerUser(array $data, EntityManager $em)
    {
        $this->validate($data);

        $user = new User();
        $user->setName($data['name'])
            ->setEmail($data['email'])
            ->setPassword($data['password']);

        $em->persist($user);
        $em->flush();
    }

    public function validate($data)
    {

        $fields = array_key_exists('name', $data)
            || array_key_exists('email', $data)
            || array_key_exists('password', $data)
            || array_key_exists('retype_password', $data);

        if (! $fields) {
            throw new \Exception('Todos os campos são requeridos');
        }

        if (filter_var($data['email'], FILTER_VALIDATE_EMAIL) === false) {
            throw new \Exception('E-mail inválido');
        }

        if ($data['password'] !== $data['retype_password']) {
            throw new \Exception('Senhas digitadas não são iguais');
        }

        if ($this->hasRegisteredEmail($data['email'])) {
            throw new \Exception('E-mail já registrado');
        }
    }

    public function hasRegisteredEmail($email)
    {
        return count(initializeDoctrine()->getRepository(User::class)->findBy([
            'email' => $email
        ])) > 0;
    }
}
