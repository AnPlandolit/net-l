<?php

namespace App\Entity;

use App\Repository\PersonaCcoRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PersonaCcoRepository::class)
 */
class PersonaCco
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Persona::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $persona;

    /**
     * @ORM\OneToMany(targetEntity=ListaMailing::class, mappedBy="personaCco")
     */
    private $listasMailings;

    public function __construct()
    {
        $this->listasMailings = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPersona(): ?Persona
    {
        return $this->persona;
    }

    public function setPersona(?Persona $persona): self
    {
        $this->persona = $persona;

        return $this;
    }

    /**
     * @return Collection<int, ListaMailing>
     */
    public function getListasMailings(): Collection
    {
        return $this->listasMailings;
    }

    public function addListasMailing(ListaMailing $listasMailing): self
    {
        if (!$this->listasMailings->contains($listasMailing)) {
            $this->listasMailings[] = $listasMailing;
            $listasMailing->setPersonaCco($this);
        }

        return $this;
    }

    public function removeListasMailing(ListaMailing $listasMailing): self
    {
        if ($this->listasMailings->removeElement($listasMailing)) {
            // set the owning side to null (unless already changed)
            if ($listasMailing->getPersonaCco() === $this) {
                $listasMailing->setPersonaCco(null);
            }
        }

        return $this;
    }

}
