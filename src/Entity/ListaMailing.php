<?php

namespace App\Entity;

use App\Repository\ListaMailingRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ListaMailingRepository::class)
 */
class ListaMailing
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Alumno::class, inversedBy="listasMailing")
     * @ORM\JoinColumn(nullable=false)
     */
    private $alumno;

    /**
     * @ORM\ManyToOne(targetEntity=Mensaje::class, inversedBy="listasMailings")
     * @ORM\JoinColumn(nullable=false)
     */
    private $mensaje;

    /**
     * @ORM\ManyToOne(targetEntity=PersonaCco::class, inversedBy="listasMailings")
     */
    private $personaCco;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAlumno(): ?Alumno
    {
        return $this->alumno;
    }

    public function setAlumno(?Alumno $alumno): self
    {
        $this->alumno = $alumno;

        return $this;
    }

    public function getMensaje(): ?Mensaje
    {
        return $this->mensaje;
    }

    public function setMensaje(?Mensaje $mensaje): self
    {
        $this->mensaje = $mensaje;

        return $this;
    }

    public function getPersonaCco(): ?PersonaCco
    {
        return $this->personaCco;
    }

    public function setPersonaCco(?PersonaCco $personaCco): self
    {
        $this->personaCco = $personaCco;

        return $this;
    }
}
