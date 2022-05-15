<?php

namespace App\Entity;

use App\Repository\MensajeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=MensajeRepository::class)
 */
class Mensaje
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
    private $asunto;

    /**
     * @ORM\Column(type="text")
     */
    private $mensaje;

    /**
     * @ORM\OneToMany(targetEntity=ListaMailing::class, mappedBy="mensaje")
     */
    private $listasMailings;

    public function __construct()
    {
        $this->listasMailings = new ArrayCollection();
    }

    public function __toString()
    {
        return $this->getAsunto();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAsunto(): ?string
    {
        return $this->asunto;
    }

    public function setAsunto(string $asunto): self
    {
        $this->asunto = $asunto;

        return $this;
    }

    public function getMensaje(): ?string
    {
        return $this->mensaje;
    }

    public function setMensaje(string $mensaje): self
    {
        $this->mensaje = $mensaje;

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
            $listasMailing->setMensaje($this);
        }

        return $this;
    }

    public function removeListasMailing(ListaMailing $listasMailing): self
    {
        if ($this->listasMailings->removeElement($listasMailing)) {
            // set the owning side to null (unless already changed)
            if ($listasMailing->getMensaje() === $this) {
                $listasMailing->setMensaje(null);
            }
        }

        return $this;
    }


}
