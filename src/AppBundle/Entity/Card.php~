<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Card
 *
 * @ORM\Table(name="card")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CardRepository")
 */
class Card
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
     * @ORM\Column(name="tipoCard", type="string", length=255)
     */
    private $tipoCard;


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
     * Set tipoCard
     *
     * @param string $tipoCard
     *
     * @return Card
     */
    public function setTipoCard($tipoCard)
    {
        $this->tipoCard = $tipoCard;

        return $this;
    }

    /**
     * Get tipoCard
     *
     * @return string
     */
    public function getTipoCard()
    {
        return $this->tipoCard;
    }

    /**
     * @ORM\OneToMany(targetEntity="Post", mappedBy="card")
     */
    private $post;

    public function __construct()
    {
        $this->post = new ArrayCollection();
    }
    public function __toString(){
        return (string) $this->tipoCard;
    }

    /**
     * Add post
     *
     * @param \AppBundle\Entity\Post $post
     *
     * @return Card
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
}
