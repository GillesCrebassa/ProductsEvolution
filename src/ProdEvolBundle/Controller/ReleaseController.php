<?php

namespace ProdEvolBundle\Controller;

use ProdEvolBundle\Entity\Release;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Release controller.
 *
 * @Route("release")
 */
class ReleaseController extends Controller
{
    /**
     * Lists all release entities.
     *
     * @Route("/", name="release_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $releases = $em->getRepository('ProdEvolBundle:Release')->findAll();

        return $this->render('release/index.html.twig', array(
            'releases' => $releases,
        ));
    }

    /**
     * Creates a new release entity.
     *
     * @Route("/new", name="release_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $release = new Release();
        $form = $this->createForm('ProdEvolBundle\Form\ReleaseType', $release);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($release);
            $em->flush();

            return $this->redirectToRoute('release_show', array('id' => $release->getId()));
        }

        return $this->render('release/new.html.twig', array(
            'release' => $release,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a release entity.
     *
     * @Route("/{id}", name="release_show")
     * @Method("GET")
     */
    public function showAction(Release $release)
    {
        $deleteForm = $this->createDeleteForm($release);

        return $this->render('release/show.html.twig', array(
            'release' => $release,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing release entity.
     *
     * @Route("/{id}/edit", name="release_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Release $release)
    {
        $deleteForm = $this->createDeleteForm($release);
        $editForm = $this->createForm('ProdEvolBundle\Form\ReleaseType', $release);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('release_edit', array('id' => $release->getId()));
        }

        return $this->render('release/edit.html.twig', array(
            'release' => $release,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a release entity.
     *
     * @Route("/{id}", name="release_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Release $release)
    {
        $form = $this->createDeleteForm($release);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($release);
            $em->flush();
        }

        return $this->redirectToRoute('release_index');
    }

    /**
     * Creates a form to delete a release entity.
     *
     * @param Release $release The release entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Release $release)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('release_delete', array('id' => $release->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
