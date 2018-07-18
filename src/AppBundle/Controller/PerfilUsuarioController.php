<?php

namespace AppBundle\Controller;

use AppBundle\Entity\PerfilUsuario;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Perfilusuario controller.
 *
 * @Route("user/perfilUsuario")
 */
class PerfilUsuarioController extends Controller
{
    /**
     * Lists all perfilUsuario entities.
     *
     * @Route("/", name="admin_perfilUsuario_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $perfilUsuarios = $em->getRepository('AppBundle:PerfilUsuario')->findAll();

        return $this->render('perfilusuario/index.html.twig', array(
            'perfilUsuarios' => $perfilUsuarios,
        ));
    }

    /**
     * Creates a new perfilUsuario entity.
     *
     * @Route("/new", name="admin_perfilUsuario_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $perfilUsuarioId = $em->getRepository('AppBundle:PerfilUsuario')->findOneByUser($this->getUser()->getId());

        if ($perfilUsuarioId){
            return $this->redirectToRoute('admin_perfilUsuario_show', array('id' => $perfilUsuarioId->getId()));

        }else{
            $perfilUsuario = new Perfilusuario();
            $form = $this->createForm('AppBundle\Form\PerfilUsuarioType', $perfilUsuario);
            $form->get('user')->setData(  $this->getUser());

            $form->handleRequest($request);

            if ($form->isSubmitted() && $form->isValid()) {

                $em = $this->getDoctrine()->getManager();
                $fileHeader=$form['imagenHeader']->getData();
                $fileAvatar=$form['imagenAvatar']->getData();

                // Sacamos la extensión del fichero
                $extHeader=$fileHeader->guessExtension();
                $extAvatar=$fileAvatar->guessExtension();
                // Le ponemos un nombre al fichero
                $file_Header=time()."Header".".".$extHeader;
                $file_Avatar=time()."Avatar".".".$extAvatar;
                // Guardamos el fichero en el directorio uploads que estará en el directorio /web del framework
                $fileHeader->move("uploads/perfilUsuario/", $file_Header);
                $fileAvatar->move("uploads/perfilUsuario/", $file_Avatar);
                // Establecemos el nombre de fichero en el atributo de la entidad
                $perfilUsuario->setImagenHeader($file_Header);
                $perfilUsuario->setImagenAvatar($file_Avatar);
                $em->persist($perfilUsuario);
                $em->flush();
                return $this->redirectToRoute('admin_perfilUsuario_show', array('id' => $perfilUsuario->getId()));
            }

            return $this->render('perfilusuario/new.html.twig', array(
                'perfilUsuario' => $perfilUsuario,
                'form' => $form->createView(),
            ));
        }

    }

    /**
     * Finds and displays a perfilUsuario entity.
     *
     * @Route("/{id}", name="admin_perfilUsuario_show")
     * @Method("GET")
     */
    public function showAction(PerfilUsuario $perfilUsuario)
    {
        $deleteForm = $this->createDeleteForm($perfilUsuario);

        return $this->render('perfilusuario/show.html.twig', array(
            'perfilUsuario' => $perfilUsuario,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing perfilUsuario entity.
     *
     * @Route("/{id}/edit", name="admin_perfilUsuario_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, PerfilUsuario $perfilUsuario)
    {
        $deleteForm = $this->createDeleteForm($perfilUsuario);
        $editForm = $this->createForm('AppBundle\Form\PerfilUsuarioType', $perfilUsuario);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('admin_perfilUsuario_edit', array('id' => $perfilUsuario->getId()));
        }

        return $this->render('perfilusuario/edit.html.twig', array(
            'perfilUsuario' => $perfilUsuario,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a perfilUsuario entity.
     *
     * @Route("/{id}", name="admin_perfilUsuario_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, PerfilUsuario $perfilUsuario)
    {
        $form = $this->createDeleteForm($perfilUsuario);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($perfilUsuario);
            $em->flush();
        }

        return $this->redirectToRoute('admin_perfilUsuario_index');
    }

    /**
     * Creates a form to delete a perfilUsuario entity.
     *
     * @param PerfilUsuario $perfilUsuario The perfilUsuario entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(PerfilUsuario $perfilUsuario)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('admin_perfilUsuario_delete', array('id' => $perfilUsuario->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
