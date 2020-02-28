<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass="App\Repository\IssuesRepository")
 */
class Issues
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\IssuesPacks")
     * @ORM\JoinColumn(nullable=false)
     */
    private $issuesPack;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $title;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $description;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\IssuesPacks")
     * @ORM\JoinColumn(nullable=false)
     */
    private $issuePack;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIssuesPack(): ?IssuesPacks
    {
        return $this->issuesPack;
    }

    public function setIssuesPack(?IssuesPacks $issuesPack): self
    {
        $this->issuesPack = $issuesPack;

        return $this;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

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

    public function getIssuePack(): ?IssuesPacks
    {
        return $this->issuePack;
    }

    public function setIssuePack(?IssuesPacks $issuePack): self
    {
        $this->issuePack = $issuePack;

        return $this;
    }
}
