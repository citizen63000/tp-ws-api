<?php

namespace App\Entity\User;

use Doctrine\ORM\Mapping as ORM;
use EasyApiBundle\Entity\User\AbstractConnectionHistory;
use EasyApiBundle\Entity\User\AbstractUser as User;
use Symfony\Component\Security\Core\User\UserInterface;

#[ORM\Entity]
class ConnectionHistory extends AbstractConnectionHistory
{
    /**
     * @var User
     */
    #[ORM\ManyToOne(targetEntity: \App\Entity\User\User::class, cascade: [])]
    protected ?UserInterface $user;
}
