<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\WorkbookRepository")
 */
class Workbook
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
    private $nom;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Sheet", mappedBy="workbook",cascade={"persist"})
     */
    private $sheets;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Category", mappedBy="relation",cascade={"persist"})
     */
    private $wks;

    public function __construct()
    {
        $this->sheets = new ArrayCollection();
        $this->wks = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * @return Collection|Sheet[]
     */
    public function getSheets(): Collection
    {
        return $this->sheets;
    }

    public function addSheet(Sheet $sheet): self
    {
        if (!$this->sheets->contains($sheet)) {
            $this->sheets[] = $sheet;
            $sheet->setWorkbook($this);
        }

        return $this;
    }

    public function removeSheet(Sheet $sheet): self
    {
        if ($this->sheets->contains($sheet)) {
            $this->sheets->removeElement($sheet);
            // set the owning side to null (unless already changed)
            if ($sheet->getWorkbook() === $this) {
                $sheet->setWorkbook(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Category[]
     */
    public function getWks(): Collection
    {
        return $this->wks;
    }

    public function addWk(Category $wk): self
    {
        if (!$this->wks->contains($wk)) {
            $this->wks[] = $wk;
            $wk->addRelation($this);
        }

        return $this;
    }

    public function removeWk(Category $wk): self
    {
        if ($this->wks->contains($wk)) {
            $this->wks->removeElement($wk);
            $wk->removeRelation($this);
        }

        return $this;
    }
}
