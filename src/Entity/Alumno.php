<?php

namespace App\Entity;

use App\Repository\AlumnoRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AlumnoRepository::class)
 */
class Alumno
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Persona::class, inversedBy="alumnos")
     * @ORM\JoinColumn(nullable=false)
     */
    private $persona;

    /**
     * @ORM\ManyToOne(targetEntity=Curso::class, inversedBy="alumnos")
     * @ORM\JoinColumn(nullable=false)
     */
    private $curso;

    /**
     * @ORM\OneToMany(targetEntity=ListaMailing::class, mappedBy="alumno")
     */
    private $listasMailing;

    /**
     * @ORM\Column(type="text")
     */
    private $mail;

    public function __construct()
    {
        $this->listasMailing = new ArrayCollection();
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

    public function getCurso(): ?Curso
    {
        return $this->curso;
    }

    public function setCurso(?Curso $curso): self
    {
        $this->curso = $curso;

        return $this;
    }

    /**
     * @return Collection<int, ListaMailing>
     */
    public function getListasMailing(): Collection
    {
        return $this->listasMailing;
    }

    public function addListasMailing(ListaMailing $listasMailing): self
    {
        if (!$this->listasMailing->contains($listasMailing)) {
            $this->listasMailing[] = $listasMailing;
            $listasMailing->setAlumno($this);
        }

        return $this;
    }

    public function removeListasMailing(ListaMailing $listasMailing): self
    {
        if ($this->listasMailing->removeElement($listasMailing)) {
            // set the owning side to null (unless already changed)
            if ($listasMailing->getAlumno() === $this) {
                $listasMailing->setAlumno(null);
            }
        }

        return $this;
    }

    public function getMail(): ?string
    {
        return $this->mail;
    }

    public function setMail(string $mail): self
    {
        $this->mail = $mail;

        return $this;
    }

}
