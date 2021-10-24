<?php

namespace App\Entity;

use App\Repository\RecetteRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=RecetteRepository::class)
 */
class Recette
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $titre;

    /**
     * @ORM\Column(type="string", length=150, nullable=true)
     */
    private $tempprepa;

    /**
     * @ORM\Column(type="string", length=150, nullable=true)
     */
    private $tempscuisson;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $imageNom;

    /**
     * @ORM\Column(type="text")
     */
    private $ingredients;

    /**
     * @ORM\Column(type="text")
     */
    private $explications;

    /**
     * @ORM\Column(type="datetime_immutable")
     */
    private $createdAt;

    /**
     * @ORM\ManyToOne(targetEntity=Category::class, inversedBy="recettes")
     */
    private $categoriesId;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): self
    {
        $this->titre = $titre;

        return $this;
    }

    public function getTempprepa(): ?string
    {
        return $this->tempprepa;
    }

    public function setTempprepa(?string $tempprepa): self
    {
        $this->tempprepa = $tempprepa;

        return $this;
    }

    public function getTempscuisson(): ?string
    {
        return $this->tempscuisson;
    }

    public function setTempscuisson(?string $tempscuisson): self
    {
        $this->tempscuisson = $tempscuisson;

        return $this;
    }

    public function getImageNom(): ?string
    {
        return $this->imageNom;
    }

    public function setImageNom(string $imageNom): self
    {
        $this->imageNom = $imageNom;

        return $this;
    }

    public function getIngredients(): ?string
    {
        return $this->ingredients;
    }

    public function setIngredients(string $ingredients): self
    {
        $this->ingredients = $ingredients;

        return $this;
    }

    public function getExplications(): ?string
    {
        return $this->explications;
    }

    public function setExplications(string $explications): self
    {
        $this->explications = $explications;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeImmutable $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getCategoriesId(): ?Category
    {
        return $this->categoriesId;
    }

    public function setCategoriesId(?Category $categoriesId): self
    {
        $this->categoriesId = $categoriesId;

        return $this;
    }
}
