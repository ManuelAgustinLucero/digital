<?php
// src/AppBundle/Entity/User.php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="fos_user")
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    /**
     * @ORM\OneToMany(targetEntity="Post", mappedBy="user")
     */
    private $post;
    /**
     * @ORM\OneToMany(targetEntity="PerfilEmpresa", mappedBy="user")
     */
    private $perfilEmpresa;
    /**
     * @ORM\OneToMany(targetEntity="PerfilUsuario", mappedBy="user")
     */
    private $perfilUser;
    /**
     * @ORM\OneToMany(targetEntity="Comentarios", mappedBy="user")
     */
    private $comentarios;
    public function __construct()
    {
        parent::__construct(
            $this->post= new ArrayCollection(),
            $this->perfilEmpresa= new ArrayCollection(),
            $this->perfilUser= new ArrayCollection(),
            $this->comentarios= new ArrayCollection()

    );
        $this->roles = array('ROLE_USER');

        // your own logic
    }

    /**
     * Add post
     *
     * @param \AppBundle\Entity\Post $post
     *
     * @return User
     */
    public function addPost(\AppBundle\Entity\Post $post)
    {
        $this->post[] = $post;

        return $this;
    }

    /**
     * Remove post
     *
     * @param \AppBundle\Entity\Post $post
     */
    public function removePost(\AppBundle\Entity\Post $post)
    {
        $this->post->removeElement($post);
    }

    /**
     * Get post
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPost()
    {
        return $this->post;
    }

    /**
     * Add perfilEmpresa
     *
     * @param \AppBundle\Entity\PerfilEmpresa $perfilEmpresa
     *
     * @return User
     */
    public function addPerfilEmpresa(\AppBundle\Entity\PerfilEmpresa $perfilEmpresa)
    {
        $this->perfilEmpresa[] = $perfilEmpresa;

        return $this;
    }

    /**
     * Remove perfilEmpresa
     *
     * @param \AppBundle\Entity\PerfilEmpresa $perfilEmpresa
     */
    public function removePerfilEmpresa(\AppBundle\Entity\PerfilEmpresa $perfilEmpresa)
    {
        $this->perfilEmpresa->removeElement($perfilEmpresa);
    }

    /**
     * Get perfilEmpresa
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPerfilEmpresa()
    {
        return $this->perfilEmpresa;
    }

    /**
     * Add perfilUser
     *
     * @param \AppBundle\Entity\PerfilUsuario $perfilUser
     *
     * @return User
     */
    public function addPerfilUser(\AppBundle\Entity\PerfilUsuario $perfilUser)
    {
        $this->perfilUser[] = $perfilUser;

        return $this;
    }

    /**
     * Remove perfilUser
     *
     * @param \AppBundle\Entity\PerfilUsuario $perfilUser
     */
    public function removePerfilUser(\AppBundle\Entity\PerfilUsuario $perfilUser)
    {
        $this->perfilUser->removeElement($perfilUser);
    }

    /**
     * Get perfilUser
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPerfilUser()
    {
        return $this->perfilUser;
    }

    /**
     * Add comentario
     *
     * @param \AppBundle\Entity\Comentarios $comentario
     *
     * @return User
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
}
