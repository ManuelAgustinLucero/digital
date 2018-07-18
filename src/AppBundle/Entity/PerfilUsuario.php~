<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PerfilUsuario
 *
 * @ORM\Table(name="perfil_usuario")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\PerfilUsuarioRepository")
 */
class PerfilUsuario
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="Nombre", type="string", length=255)
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="imagenHeader", type="string", length=255)
     */
    private $imagenHeader;
    /**
     * @var string
     *
     * @ORM\Column(name="imagenAvatar", type="string", length=255)
     */
    private $imagenAvatar;
    /**
     * @var string
     *
     * @ORM\Column(name="Descripcion", type="string", length=255)
     */
    private $descripcion;

    /**
     * @var string
     *
     * @ORM\Column(name="profesion", type="string", length=255, nullable=true)
     */
    private $profesion;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     *
     * @return PerfilUsuario
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get nombre
     *
     * @return string
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set descripcion
     *
     * @param string $descripcion
     *
     * @return PerfilUsuario
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    /**
     * Get descripcion
     *
     * @return string
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * Set profesion
     *
     * @param string $profesion
     *
     * @return PerfilUsuario
     */
    public function setProfesion($profesion)
    {
        $this->profesion = $profesion;

        return $this;
    }

    /**
     * Get profesion
     *
     * @return string
     */
    public function getProfesion()
    {
        return $this->profesion;
    }

    /**
     * @ORM\ManyToOne(targetEntity="User", inversedBy="perfilUser")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    private $user;

    /**
     * Set user
     *
     * @param \AppBundle\Entity\User $user
     *
     * @return PerfilUsuario
     */
    public function setUser(\AppBundle\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \AppBundle\Entity\User
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set imagenHeader
     *
     * @param string $imagenHeader
     *
     * @return PerfilUsuario
     */
    public function setImagenHeader($imagenHeader)
    {
        $this->imagenHeader = $imagenHeader;

        return $this;
    }

    /**
     * Get imagenHeader
     *
     * @return string
     */
    public function getImagenHeader()
    {
        return $this->imagenHeader;
    }

    /**
     * Set imagenAvatar
     *
     * @param string $imagenAvatar
     *
     * @return PerfilUsuario
     */
    public function setImagenAvatar($imagenAvatar)
    {
        $this->imagenAvatar = $imagenAvatar;

        return $this;
    }

    /**
     * Get imagenAvatar
     *
     * @return string
     */
    public function getImagenAvatar()
    {
        return $this->imagenAvatar;
    }
}
