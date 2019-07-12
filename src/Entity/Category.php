<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CategoryRepository")
 */
class Category
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\BlogPost", mappedBy="Cat")
     */
    private $Nom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    public function __construct()
    {
        $this->Nom = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection|BlogPost[]
     */
    public function getNom(): Collection
    {
        return $this->Nom;
    }

    public function addNom(BlogPost $nom): self
    {
        if (!$this->Nom->contains($nom)) {
            $this->Nom[] = $nom;
            $nom->setCat($this);
        }

        return $this;
    }

    public function removeNom(BlogPost $nom): self
    {
        if ($this->Nom->contains($nom)) {
            $this->Nom->removeElement($nom);
            // set the owning side to null (unless already changed)
            if ($nom->getCat() === $this) {
                $nom->setCat(null);
            }
        }

        return $this;
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
}
