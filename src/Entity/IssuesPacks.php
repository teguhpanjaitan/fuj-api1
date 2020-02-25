<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\IssuesPacksRepository")
 */
class IssuesPacks
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Groups")
     * @ORM\JoinColumn(nullable=false)
     */
    private $theGroup;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $description;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Users")
     * @ORM\JoinColumn(nullable=false)
     */
    private $uCreator;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getUCreator(): ?Users
    {
        return $this->uCreator;
    }

    public function setUCreator(?Users $uCreator): self
    {
        $this->uCreator = $uCreator;

        return $this;
    }
}
