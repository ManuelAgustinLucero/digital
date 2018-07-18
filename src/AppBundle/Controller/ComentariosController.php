<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Comentarios;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

/**
 * Comentario controller.
 *
 * @Route("comentarios")
 */
class ComentariosController extends Controller
{
    /**
     * Lists all comentario entities.
     *
     * @Route("/", name="comentarios_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $comentarios = $em->getRepository('AppBundle:Comentarios')->findAll();

        return $this->render('comentarios/index.html.twig', array(
            'comentarios' => $comentarios,
        ));
    }

    /**
     * Creates a new comentario entity.
     *
     * @Route("/new", name="comentarios_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $comentario = new Comentarios();
        $form = $this->createForm('AppBundle\Form\ComentariosType', $comentario);
        $form->get('user')->setData(  $this->getUser());

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($comentario);
            $em->flush();

            return $this->redirectToRoute('comentarios_show', array('id' => $comentario->getId()));
        }

        return $this->render('comentarios/new.html.twig', array(
            'comentario' => $comentario,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a comentario entity.
     *
     * @Route("/{id}", name="comentarios_show")
     * @Method("GET")
     */
    public function showAction(Comentarios $comentario)
    {
        $deleteForm = $this->createDeleteForm($comentario);

        return $this->render('comentarios/show.html.twig', array(
            'comentario' => $comentario,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing comentario entity.
     *
     * @Route("/{id}/edit", name="comentarios_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Comentarios $comentario)
    {
        $deleteForm = $this->createDeleteForm($comentario);
        $editForm = $this->createForm('AppBundle\Form\ComentariosType', $comentario);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('comentarios_edit', array('id' => $comentario->getId()));
        }

        return $this->render('comentarios/edit.html.twig', array(
            'comentario' => $comentario,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a comentario entity.
     *
     * @Route("/{id}", name="comentarios_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Comentarios $comentario)
    {
        $form = $this->createDeleteForm($comentario);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($comentario);
            $em->flush();
        }

        return $this->redirectToRoute('comentarios_index');
    }

    /**
     * Creates a form to delete a comentario entity.
     *
     * @param Comentarios $comentario The comentario entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Comentarios $comentario)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('comentarios_delete', array('id' => $comentario->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }

    /**
     * Creates a new comentario entity.
     *
     * @Route("/json/new", name="json_comentarios_new")
     * @Method({"GET", "POST"})
     */
    public function jsonnewAction(Request $request)
    {
        $coment= $request->request->get('comentario');
        $postID= $request->request->get('postID');
        $em = $this->getDoctrine()->getManager();

        $post = $em->getRepository('AppBundle:Post')->find($postID);

        $comentario = new Comentarios();
        $comentario->setUser($this->getUser());
        $comentario->setComentario($coment);
        $comentario->setPost($post);
        $comentario->setFechaCreacion(new \DateTime('now'));
        $comentario->setFechaActualizacion(new \DateTime('now'));
        $em->persist($comentario);
        $em->flush();

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
            ->innerJoin('AppBundle:User', 'u', 'WITH', 'c.user = u.id')
            ->innerJoin('AppBundle:Post', 'p', 'WITH', 'p.id = c.post')
            ->innerJoin('AppBundle:PerfilUsuario', 'pe', 'WITH', 'u.id = pe.id')

            ->where('c.id = :id')
            ->setParameter('id', $comentario->getId())

            ->setMaxResults(10000)
        ;
        $comentarios=$query->getQuery()->getResult(\Doctrine\ORM\Query::HYDRATE_ARRAY);
        return new JsonResponse($comentarios);


    }
    /**
     * Creates a new comentario entity.
     *
     * @Route("/json/delete", name="json_comentarios_delete")
     * @Method({"GET", "POST"})
     */
    public function jsonDeleteAction(Request $request)
    {
        $comentID= $request->request->get('comentID');
        $em = $this->getDoctrine()->getManager();
        $comentario=$em->getRepository('AppBundle:Comentarios')->find($comentID) ;

            if ($comentario->getUser()->getId()==$this->getUser()->getId()){
                $em->remove($comentario);
                $em->flush();
                $respuesta="Success";


            }else{
                $respuesta="No tiene permisos";
            }



        return new JsonResponse($respuesta);


    }
}
