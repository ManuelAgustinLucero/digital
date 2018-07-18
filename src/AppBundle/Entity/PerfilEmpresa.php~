<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PerfilEmpresa
 *
 * @ORM\Table(name="perfil_empresa")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\PerfilEmpresaRepository")
 */
class PerfilEmpresa
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
     * @ORM\Column(name="nombre", type="string", length=255)
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="descripcion", type="text")
     */
    private $descripcion;

    /**
     * @var string
     *
     * @ORM\Column(name="telefono", type="string", length=255, nullable=true)
     */
    private $telefono;

    /**
     * @var string
     *
     * @ORM\Column(name="imagen_header", type="string", length=255, nullable=true)
     */
    private $imagenHeader;

    /**
     * @var string
     *
     * @ORM\Column(name="imagen_logo", type="string", length=255, nullable=true)
     */
    private $imagenLogo;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_creacion", type="datetime")
     */
    private $fechaCreacion;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_actualizacion", type="datetime")
     */
    private $fechaActualizacion;

    /**
     * @var string
     *
     * @ORM\Column(name="direccion", type="string", length=255, nullable=true)
     */
    private $direccion;

    /**
     * @var string
     *
     * @ORM\Column(name="link_web", type="string", length=255, nullable=true)
     */
    private $linkWeb;

    /**
     * @var string
     *
     * @ORM\Column(name="correo", type="string", length=255, nullable=true)
     */
    private $correo;


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
     * @return PerfilEmpresa
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
     * @return PerfilEmpresa
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
     * Set telefono
     *
     * @param string $telefono
     *
     * @return PerfilEmpresa
     */
    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;

        return $this;
    }

    /**
     * Get telefono
     *
     * @return string
     */
    public function getTelefono()
    {
        return $this->telefono;
    }

    /**
     * Set imagenHeader
     *
     * @param string $imagenHeader
     *
     * @return PerfilEmpresa
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
     * Set imagenLogo
     *
     * @param string $imagenLogo
     *
     * @return PerfilEmpresa
     */
    public function setImagenLogo($imagenLogo)
    {
        $this->imagenLogo = $imagenLogo;

        return $this;
    }

    /**
     * Get imagenLogo
     *
     * @return string
     */
    public function getImagenLogo()
    {
        return $this->imagenLogo;
    }

    /**
     * Set fechaCreacion
     *
     * @param \DateTime $fechaCreacion
     *
     * @return PerfilEmpresa
     */
    public function setFechaCreacion($fechaCreacion)
    {
        $this->fechaCreacion = $fechaCreacion;

        return $this;
    }

    /**
     * Get fechaCreacion
     *
     * @return \DateTime
     */
    public function getFechaCreacion()
    {
        return $this->fechaCreacion;
    }

    /**
     * Set fechaActualizacion
     *
     * @param \DateTime $fechaActualizacion
     *
     * @return PerfilEmpresa
     */
    public function setFechaActualizacion($fechaActualizacion)
    {
        $this->fechaActualizacion = $fechaActualizacion;

        return $this;
    }

    /**
     * Get fechaActualizacion
     *
     * @return \DateTime
     */
    public function getFechaActualizacion()
    {
        return $this->fechaActualizacion;
    }

    /**
     * Set direccion
     *
     * @param string $direccion
     *
     * @return PerfilEmpresa
     */
    public function setDireccion($direccion)
    {
        $this->direccion = $direccion;

        return $this;
    }

    /**
     * Get direccion
     *
     * @return string
     */
    public function getDireccion()
    {
        return $this->direccion;
    }

    /**
     * Set linkWeb
     *
     * @param string $linkWeb
     *
     * @return PerfilEmpresa
     */
    public function setLinkWeb($linkWeb)
    {
        $this->linkWeb = $linkWeb;

        return $this;
    }

    /**
     * Get linkWeb
     *
     * @return string
     */
    public function getLinkWeb()
    {
        return $this->linkWeb;
    }

    /**
     * Set correo
     *
     * @param string $correo
     *
     * @return PerfilEmpresa
     */
    public function setCorreo($correo)
    {
        $this->correo = $correo;

        return $this;
    }

    /**
     * Get correo
     *
     * @return string
     */
    public function getCorreo()
    {
        return $this->correo;
    }
    /**
     * @ORM\ManyToOne(targetEntity="User", inversedBy="perfilEmpresa")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    private $user;

    /**
     * Set user
     *
     * @param \AppBundle\Entity\User $user
     *
     * @return PerfilEmpresa
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
}
