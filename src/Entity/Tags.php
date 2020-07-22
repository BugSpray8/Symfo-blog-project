<?php

namespace App\Entity;

use App\Repository\TagsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TagsRepository::class)
 */
class Tags
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $tag;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $slug;

    /**
     * @ORM\ManyToMany(targetEntity=Articles::class, inversedBy="tags")
     */
    private $ArticlesId;

    public function __construct()
    {
        $this->ArticlesId = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTag(): ?string
    {
        return $this->tag;
    }

    public function setTag(string $tag): self
    {
        $this->tag = $tag;

        return $this;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): self
    {
        $this->slug = $slug;

        return $this;
    }

    /**
     * @return Collection|Articles[]
     */
    public function getArticlesId(): Collection
    {
        return $this->ArticlesId;
    }

    public function addArticlesId(Articles $articlesId): self
    {
        if (!$this->ArticlesId->contains($articlesId)) {
            $this->ArticlesId[] = $articlesId;
        }

        return $this;
    }

    public function removeArticlesId(Articles $articlesId): self
    {
        if ($this->ArticlesId->contains($articlesId)) {
            $this->ArticlesId->removeElement($articlesId);
        }

        return $this;
    }
}
