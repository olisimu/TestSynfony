<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\SheetRepository")
 */
class Sheet
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
    private $Nom;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Workbook", inversedBy="sheets",cascade={"persist"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $workbook;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->Nom;
    }

    public function setNom(string $Nom): self
    {
        $this->Nom = $Nom;

        return $this;
    }

    public function getWorkbook(): ?Workbook
    {
        return $this->workbook;
    }

    public function setWorkbook(?Workbook $workbook): self
    {
        $this->workbook = $workbook;

        return $this;
    }
}
