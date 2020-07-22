<?php

namespace App\Entity;

use App\Repository\CategoriesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CategoriesRepository::class)
 */
class Categories
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
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $slug;

    /**
     * @ORM\ManyToMany(targetEntity=Articles::class, inversedBy="categories")
     */
    private $articlesId;

    public function __construct()
    {
        $this->articlesId = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

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
        return $this->articlesId;
    }

    public function addArticlesId(Articles $articlesId): self
    {
        if (!$this->articlesId->contains($articlesId)) {
            $this->articlesId[] = $articlesId;
        }

        return $this;
    }

    public function removeArticlesId(Articles $articlesId): self
    {
        if ($this->articlesId->contains($articlesId)) {
            $this->articlesId->removeElement($articlesId);
        }

        return $this;
    }
}
