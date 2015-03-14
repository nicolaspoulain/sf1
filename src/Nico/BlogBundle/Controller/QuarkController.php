<?php

namespace Nico\BlogBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Nico\BlogBundle\Entity\Quark;
use Nico\BlogBundle\Form\QuarkType;

/**
 * Quark controller.
 *
 */
class QuarkController extends Controller
{

    /**
     * Lists all Quark entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('NicoBlogBundle:Quark')->findAllQuarkAndTags();

        return $this->render('NicoBlogBundle:Quark:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Quark entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Quark();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('quark_show', array('id' => $entity->getId())));
        }

        return $this->render('NicoBlogBundle:Quark:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Quark entity.
     *
     * @param Quark $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Quark $entity)
    {
        $form = $this->createForm(new QuarkType(), $entity, array(
            'action' => $this->generateUrl('quark_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Quark entity.
     *
     */
    public function newAction()
    {
        $entity = new Quark();
        $form   = $this->createCreateForm($entity);

        return $this->render('NicoBlogBundle:Quark:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Quark entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('NicoBlogBundle:Quark')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Quark entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('NicoBlogBundle:Quark:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Quark entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('NicoBlogBundle:Quark')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Quark entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('NicoBlogBundle:Quark:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Quark entity.
    *
    * @param Quark $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Quark $entity)
    {
        $form = $this->createForm(new QuarkType(), $entity, array(
            'action' => $this->generateUrl('quark_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Quark entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('NicoBlogBundle:Quark')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Quark entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('quark_edit', array('id' => $id)));
        }

        return $this->render('NicoBlogBundle:Quark:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Quark entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('NicoBlogBundle:Quark')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Quark entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('quark'));
    }

    /**
     * Creates a form to delete a Quark entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('quark_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
