<?php
/**
 * Created by PhpStorm.
 * User: manuel
 * Date: 10/07/18
 * Time: 20:43
 */

namespace AppBundle\Controller;

use AppBundle\Entity\Post;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;


/**
 * Post controller.
 *
 * @Route("noticias")
 */
class ViewPostController extends Controller
{
    /**
     * Lists all post entities.
     *
     * @Route("/", name="noticias_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

//        $posts= $em->getRepository('AppBundle:Post')->findAll(array( 'id' => 'DESC'));

        $repository = $this->getDoctrine()->getRepository('AppBundle:Post');
        $query = $repository->createQueryBuilder('p')
            ->orderBy('p.id', 'DESC')
            ->getQuery();

        $posts = $query->getResult();



        return $this->render('front/noticias/index.html.twig', array(
            'posts' => $posts,
        ));
    }
    /**
     * Finds and displays a post entity.
     *
     * @Route("/{id}", name="noticias_show")
     * @Method("GET")
     */
    public function showAction(Request $request,$id)
    {
        $em = $this->getDoctrine()->getManager();

        $post = $em->getRepository('AppBundle:Post')->find($id);

        $repository = $em->getRepository("AppBundle:Comentarios");
        $query = $repository->createQueryBuilder('c')
            ->select(array(
                    'c.id',
                    'c.comentario',
                    'c.fechaCreacion',
                    'pe.imagenAvatar',
                    'pe.nombre',
                    'u.username',
                    'u.id as userId'

                )
            )
            ->innerJoin('AppBundle:User', 'u', 'WITH', 'u.id = c.user')
            ->innerJoin('AppBundle:Post', 'p', 'WITH', 'p.id = c.post')
            ->innerJoin('AppBundle:PerfilUsuario', 'pe', 'WITH', 'c.user = pe.id')

            ->where('p.id = :id')
            ->setParameter('id', $post->getId())
            ->orderBy('c.id', 'DESC')
            ->setMaxResults(10000)
        ;
        $comentarios=$query->getQuery()->getResult(\Doctrine\ORM\Query::HYDRATE_ARRAY);
        return $this->render('front/noticias//show.html.twig', array(
            'post' => $post,
            'comentarios'=>$comentarios
        ));
    }
    /**
     * Finds and displays a post entity.
     *
     * @Route("/delete/{id}", name="noticias_delete")
     * @Method("GET")
     */
    public function deleteAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $post = $em->getRepository('AppBundle:Post')->find($id);
        $comentarios = $em->getRepository('AppBundle:Comentarios')->findBy(array('post'=>$id));
        foreach ($comentarios as $comentario){
            $em->remove($comentario);
            $em->flush();

        }
        $em->remove($post);
        $em->flush();

        return $this->redirectToRoute('noticias_index');

    }
}