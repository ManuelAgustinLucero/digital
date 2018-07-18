<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ImagenPost
 *
 * @ORM\Table(name="image_post")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ImagePostRepository")
 */
class ImagenPost
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
     * @ORM\Column(name="img_post", type="string", length=255)
     */
    private $imgPost;


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
     * Set imgPost
     *
     * @param string $imgPost
     *
     * @return ImagenPost
     */
    public function setImgPost($imgPost)
    {
        $this->imgPost = $imgPost;

        return $this;
    }

    /**
     * Get imgPost
     *
     * @return string
     */
    public function getImgPost()
    {
        return $this->imgPost;
    }
    /**
     * @ORM\ManyToOne(targetEntity="Post", inversedBy="imagenPost")
     * @ORM\JoinColumn(name="post_id", referencedColumnName="id")
     */
    private $post;

    /**
     * Set post
     *
     * @param \AppBundle\Entity\Post $post
     *
     * @return ImagenPost
     */
    public function setPost(\AppBundle\Entity\Post $post = null)
    {
        $this->post = $post;

        return $this;
    }

    /**
     * Get post
     *
     * @return \AppBundle\Entity\Post
     */
    public function getPost()
    {
        return $this->post;
    }
}
