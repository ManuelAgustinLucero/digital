<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Post
 *
 * @ORM\Table(name="post")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\PostRepository")
 */
class Post
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
     * @ORM\Column(name="titulo", type="string", length=255)
     */
    private $titulo;

    /**
     * @var string
     *
     * @ORM\Column(name="subtitulo", type="string", length=255, nullable=true)
     */
    private $subtitulo;

    /**
     * @var string
     *
     * @ORM\Column(name="texto", type="text")
     */
    private $texto;

    /**
     * @var int
     *
     * @ORM\Column(name="numeroAviso", type="integer", nullable=true, unique=true)
     */
    private $numeroAviso;

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
     * @var bool
     *
     * @ORM\Column(name="estado", type="boolean", nullable=true)
     */
    private $estado;

    /**
     * @var string
     *
     * @ORM\Column(name="ubicacion_map", type="string", length=255, nullable=true)
     */
    private $ubicacionMap;

    /**
     * @var float
     *
     * @ORM\Column(name="precio", type="float", nullable=true)
     */
    private $precio;

    /**
     * @var string
     *
     * @ORM\Column(name="imagenHeader", type="string", length=255)
     */
    private $imagenHeader;
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
     * Set titulo
     *
     * @param string $titulo
     *
     * @return Post
     */
    public function setTitulo($titulo)
    {
        $this->titulo = $titulo;

        return $this;
    }

    /**
     * Get titulo
     *
     * @return string
     */
    public function getTitulo()
    {
        return $this->titulo;
    }

    /**
     * Set subtitulo
     *
     * @param string $subtitulo
     *
     * @return Post
     */
    public function setSubtitulo($subtitulo)
    {
        $this->subtitulo = $subtitulo;

        return $this;
    }

    /**
     * Get subtitulo
     *
     * @return string
     */
    public function getSubtitulo()
    {
        return $this->subtitulo;
    }

    /**
     * Set texto
     *
     * @param string $texto
     *
     * @return Post
     */
    public function setTexto($texto)
    {
        $this->texto = $texto;

        return $this;
    }

    /**
     * Get texto
     *
     * @return string
     */
    public function getTexto()
    {
        return $this->texto;
    }

    /**
     * Set numeroAviso
     *
     * @param integer $numeroAviso
     *
     * @return Post
     */
    public function setNumeroAviso($numeroAviso)
    {
        $this->numeroAviso = $numeroAviso;

        return $this;
    }

    /**
     * Get numeroAviso
     *
     * @return int
     */
    public function getNumeroAviso()
    {
        return $this->numeroAviso;
    }

    /**
     * Set fechaCreacion
     *
     * @param \DateTime $fechaCreacion
     *
     * @return Post
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
     * @return Post
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
     * Set estado
     *
     * @param boolean $estado
     *
     * @return Post
     */
    public function setEstado($estado)
    {
        $this->estado = $estado;

        return $this;
    }

    /**
     * Get estado
     *
     * @return bool
     */
    public function getEstado()
    {
        return $this->estado;
    }

    /**
     * Set ubicacionMap
     *
     * @param string $ubicacionMap
     *
     * @return Post
     */
    public function setUbicacionMap($ubicacionMap)
    {
        $this->ubicacionMap = $ubicacionMap;

        return $this;
    }

    /**
     * Get ubicacionMap
     *
     * @return string
     */
    public function getUbicacionMap()
    {
        return $this->ubicacionMap;
    }

    /**
     * Set precio
     *
     * @param float $precio
     *
     * @return Post
     */
    public function setPrecio($precio)
    {
        $this->precio = $precio;

        return $this;
    }

    /**
     * Get precio
     *
     * @return float
     */
    public function getPrecio()
    {
        return $this->precio;
    }
    /**
     * @ORM\ManyToOne(targetEntity="User", inversedBy="post")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    private $user;
    /**
     * @ORM\ManyToOne(targetEntity="Rubro", inversedBy="post")
     * @ORM\JoinColumn(name="rubro_id", referencedColumnName="id")
     */
    private $rubro;
    /**
     * @ORM\ManyToOne(targetEntity="Card", inversedBy="post")
     * @ORM\JoinColumn(name="card_id", referencedColumnName="id")
     */
    private $caard;
    /**
     * @ORM\OneToMany(targetEntity="Comentarios", mappedBy="post")
     */
    private $comentarios;
    /**
     * @ORM\OneToMany(targetEntity="ImagenPost", mappedBy="post")
     */
    private $imagenPost;
    public function __construct()
    {
        $this->comentarios = new ArrayCollection();
        $this->imagenPost = new ArrayCollection();

    }

    /**
     * Set user
     *
     * @param \AppBundle\Entity\User $user
     *
     * @return Post
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
     * Set rubro
     *
     * @param \AppBundle\Entity\Rubro $rubro
     *
     * @return Post
     */
    public function setRubro(\AppBundle\Entity\Rubro $rubro = null)
    {
        $this->rubro = $rubro;

        return $this;
    }

    /**
     * Get rubro
     *
     * @return \AppBundle\Entity\Rubro
     */
    public function getRubro()
    {
        return $this->rubro;
    }

    /**
     * Add comentario
     *
     * @param \AppBundle\Entity\Comentarios $comentario
     *
     * @return Post
     */
    public function addComentario(\AppBundle\Entity\Comentarios $comentario)
    {
        $this->comentarios[] = $comentario;

        return $this;
    }

    /**
     * Remove comentario
     *
     * @param \AppBundle\Entity\Comentarios $comentario
     */
    public function removeComentario(\AppBundle\Entity\Comentarios $comentario)
    {
        $this->comentarios->removeElement($comentario);
    }

    /**
     * Get comentarios
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getComentarios()
    {
        return $this->comentarios;
    }

    /**
     * Add imagenPost
     *
     * @param \AppBundle\Entity\ImagenPost $imagenPost
     *
     * @return Post
     */
    public function addImagenPost(\AppBundle\Entity\ImagenPost $imagenPost)
    {
        $this->imagenPost[] = $imagenPost;

        return $this;
    }

    /**
     * Remove imagenPost
     *
     * @param \AppBundle\Entity\ImagenPost $imagenPost
     */
    public function removeImagenPost(\AppBundle\Entity\ImagenPost $imagenPost)
    {
        $this->imagenPost->removeElement($imagenPost);
    }

    /**
     * Get imagenPost
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getImagenPost()
    {
        return $this->imagenPost;
    }

    /**
     * Set imagenHeader
     *
     * @param string $imagenHeader
     *
     * @return Post
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
     * Set caard
     *
     * @param \AppBundle\Entity\Card $caard
     *
     * @return Post
     */
    public function setCaard(\AppBundle\Entity\Card $caard = null)
    {
        $this->caard = $caard;

        return $this;
    }

    /**
     * Get caard
     *
     * @return \AppBundle\Entity\Card
     */
    public function getCaard()
    {
        return $this->caard;
    }
}
