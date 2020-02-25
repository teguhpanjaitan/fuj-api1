<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass="App\Repository\GroupUserAliasesRepository")
 */
class GroupUserAliases
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Users")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Groups")
     * @ORM\JoinColumn(nullable=false)
     */
    private $theGroup;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $userNickname;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $userRole = "member"; //admin | member

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUser(): ?Users
    {
        return $this->user;
    }

    public function setUser(?Users $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getTheGroup(): ?Groups
    {
        return $this->theGroup;
    }

    public function setTheGroup(?Groups $theGroup): self
    {
        $this->theGroup = $theGroup;

        return $this;
    }

    public function getUserNickname(): ?string
    {
        return $this->userNickname;
    }

    public function setUserNickname(?string $userNickname): self
    {
        $this->userNickname = $userNickname;

        return $this;
    }

    public function getUserRole(): ?string
    {
        return $this->userRole;
    }

    public function setUserRole(string $userRole): self
    {
        $this->userRole = $userRole;

        return $this;
    }
}
