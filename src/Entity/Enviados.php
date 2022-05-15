<?php

namespace App\Entity;

use App\Repository\EnviadosRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=EnviadosRepository::class)
 */
class Enviados
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $enviado;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $error;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $response;

    /**
     * @ORM\Column(type="text")
     */
    private $textoEnviado;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $fechaRegistro;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function isEnviado(): ?bool
    {
        return $this->enviado;
    }

    public function setEnviado(?bool $enviado): self
    {
        $this->enviado = $enviado;

        return $this;
    }

    public function isError(): ?bool
    {
        return $this->error;
    }

    public function setError(?bool $error): self
    {
        $this->error = $error;

        return $this;
    }

    public function getResponse(): ?string
    {
        return $this->response;
    }

    public function setResponse(?string $response): self
    {
        $this->response = $response;

        return $this;
    }

    public function getTextoEnviado(): ?string
    {
        return $this->textoEnviado;
    }

    public function setTextoEnviado(string $textoEnviado): self
    {
        $this->textoEnviado = $textoEnviado;

        return $this;
    }

    public function getFechaRegistro(): ?\DateTimeInterface
    {
        return $this->fechaRegistro;
    }

    public function setFechaRegistro(?\DateTimeInterface $fechaRegistro): self
    {
        $this->fechaRegistro = $fechaRegistro;

        return $this;
    }
}
