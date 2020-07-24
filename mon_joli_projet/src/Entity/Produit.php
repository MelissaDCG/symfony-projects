<?php

namespace App\Entity;

use App\Repository\ProduitRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ProduitRepository::class)
 */
class Produit
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=8)
     */
    private $refBd;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $heros;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $titre;

    /**
     * @ORM\Column(type="decimal", precision=8, scale=2)
     */
    private $prixPublic;

    /**
     * @ORM\Column(type="decimal", precision=8, scale=2)
     */
    private $prixEditeur;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $resume;

    /**
     * @ORM\Column(type="bigint", nullable=true)
     */
    private $refFournisseur;

    /**
     * @ORM\Column(type="bigint", nullable=true)
     */
    private $refEditeur;

    /**
     * @ORM\ManyToOne(targetEntity=Auteur::class, inversedBy="produits")
     * @ORM\JoinColumn(nullable=false)
     */
    private $auteur;

    /**
     * @ORM\ManyToOne(targetEntity=Genre::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $genre;

    /**
     * @ORM\ManyToOne(targetEntity=Fournisseur::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $fournisseur;

    /**
     * @ORM\ManyToOne(targetEntity=Editeur::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $editeur;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRefBd(): ?string
    {
        return $this->refBd;
    }

    public function setRefBd(string $refBd): self
    {
        $this->refBd = $refBd;

        return $this;
    }

    public function getHeros(): ?string
    {
        return $this->heros;
    }

    public function setHeros(?string $heros): self
    {
        $this->heros = $heros;

        return $this;
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

    public function getPrixPublic(): ?string
    {
        return $this->prixPublic;
    }

    public function setPrixPublic(string $prixPublic): self
    {
        $this->prixPublic = $prixPublic;

        return $this;
    }

    public function getPrixEditeur(): ?string
    {
        return $this->prixEditeur;
    }

    public function setPrixEditeur(string $prixEditeur): self
    {
        $this->prixEditeur = $prixEditeur;

        return $this;
    }

    public function getResume(): ?string
    {
        return $this->resume;
    }

    public function setResume(?string $resume): self
    {
        $this->resume = $resume;

        return $this;
    }

    public function getRefFournisseur(): ?string
    {
        return $this->refFournisseur;
    }

    public function setRefFournisseur(?string $refFournisseur): self
    {
        $this->refFournisseur = $refFournisseur;

        return $this;
    }

    public function getRefEditeur(): ?string
    {
        return $this->refEditeur;
    }

    public function setRefEditeur(?string $refEditeur): self
    {
        $this->refEditeur = $refEditeur;

        return $this;
    }

    public function getAuteur(): ?Auteur
    {
        return $this->auteur;
    }

    public function setAuteur(?Auteur $auteur): self
    {
        $this->auteur = $auteur;

        return $this;
    }

    public function getGenre(): ?Genre
    {
        return $this->genre;
    }

    public function setGenre(?Genre $genre): self
    {
        $this->genre = $genre;

        return $this;
    }

    public function getFournisseur(): ?Fournisseur
    {
        return $this->fournisseur;
    }

    public function setFournisseur(?Fournisseur $fournisseur): self
    {
        $this->fournisseur = $fournisseur;

        return $this;
    }

    public function getEditeur(): ?Editeur
    {
        return $this->editeur;
    }

    public function setEditeur(?Editeur $editeur): self
    {
        $this->editeur = $editeur;

        return $this;
    }
}
