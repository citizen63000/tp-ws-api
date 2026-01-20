<?php

namespace App\Entity\User;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\UniqueConstraint;
use EasyApiJwtAuthentication\Entity\AbstractUser;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity]
#[ORM\Table(name: '`user`')]
#[UniqueConstraint(name: 'username', columns: ['username'])]
class User extends AbstractUser
{
    #[ORM\Column(type: 'string', nullable: true)]
    #[Groups(['user_light'])]
    protected ?string $firstname = null;

    #[ORM\Column(type: 'string', nullable: true)]
    #[Groups(['user_light'])]
    protected ?string $lastname = null;

    /**
     * @return string|null
     */
    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    /**
     * @param string|null $firstname
     */
    public function setFirstname(?string $firstname): void
    {
        $this->firstname = $firstname;
    }

    /**
     * @return string|null
     */
    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    /**
     * @param string|null $lastname
     */
    public function setLastname(?string $lastname): void
    {
        $this->lastname = $lastname;
    }

    public function getUserIdentifier(): string
    {
        return $this->getUsername();
    }
}
