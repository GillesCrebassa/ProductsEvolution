<?php

namespace ProdEvolBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;


use ProdEvolBundle\Entity\Product;
use ProdEvolBundle\Form\ProductType;
use ProdEvolBundle\Entity\Release;


class ReleaseController extends Controller
{
    /**
     * @Route("/Release/", name="release"))
     */
    public function indexAction()
    {
        return $this->render('ProdEvolBundle:Release:index.html.twig');
    }
    
    /**
     * @Route("/Release/list/", name="release_list"))
     */
    public function listAction()
    {
        $em = $this->getDoctrine()->getManager();
        $releaseRepository = $em->getRepository(Release::class);
        $releases = $releaseRepository->findAll();
        
        return $this->render('ProdEvolBundle:Release:list.html.twig',array('releases'=>$releases));
    }

    /**
     * @Route("/Release/add/", name="release_add"))
     */
    public function AddAction(Request $request)
    {
        $release = new Release();
        $form = $this->createForm(ReleaseType::class,$release);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid())
        {
            $em = $this->getDoctrine()->getManager();
/* to DO adapt*/
            $product = new Product();
            $product->setName("testgcr1");
            $product->setMedia ("dvd");
            $product->setSupplier("lol");
            $release->setProduct();
            $em->persist($product);
/* to DO adapt*/
            $em->persist($release);
            $em->flush();
            // TODO flash message
            return $this->redirectToRoute('release_list');
        }
        return $this->render('ProdEvolBundle::Release/add.html.twig',
                array('form'=>$form->createView()));
 
    }
    
     /**
     * @Route("/Release/view/", name="release_view"))
     */
    public function viewAction()
    {
        return $this->render('ProdEvolBundle:Release:view.html.twig');
    }
   
    /**
     * @Route("/Release/update/", name="release_update"))
     */
    public function updateAction()
    {
        return $this->render('ProdEvolBundle:Release:update.html.twig');
    }
    
}
