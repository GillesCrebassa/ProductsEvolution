<?php

namespace ProdEvolBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;


use ProdEvolBundle\Entity\Product;
use ProdEvolBundle\Form\ProductType;
use ProdEvolBundle\Entity\Release;


class ProductController extends Controller
{
    /**
     * @Route("/Product/", name="product"))
     */
    public function indexAction()
    {
        return $this->render('ProdEvolBundle:Product:index.html.twig');
    }
    
    /**
     * @Route("/Product/list/", name="product_list"))
     */
    public function listAction()
    {
        $em = $this->getDoctrine()->getManager();
        $productRepository = $em->getRepository(Product::class);
        $products = $productRepository->findAll();
        
        return $this->render('ProdEvolBundle:Product:list.html.twig',array('products'=>$products));
    }

    /**
     * @Route("/Product/add/", name="product_add"))
     */
    public function AddAction(Request $request)
    {
        $product = new Product();
        $form = $this->createForm(ProductType::class,$product);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid())
        {
            $em = $this->getDoctrine()->getManager();
            $em->persist($product);
            $em->flush();
            return $this->redirectToRoute('product_list');
        }
        return $this->render('ProdEvolBundle::Product/add.html.twig',
                array('form'=>$form->createView()));
 
/*
        $product->setName('test2');
        $product->setMedia('DVD');
        $product->setRemarks('lol');
        $product->setDescription('desc');
        $product->setSite('www.test.com');
        $product->setTypeId(2);
        $em->persist($product);
        $em->flush();
  */      
        //return $this->render('ProdEvolBundle:Product:add.html.twig');
    }
    
     /**
     * @Route("/Product/view/{product_id}", name="product_view")
     */
    public function viewAction($product_id)
    {
        $em = $this->getDoctrine()->getManager();
        $product = $em->getRepository('ProdEvolBundle:Product')->find($product_id);
        if (null === $product)
        {
            throw new \Symfony\Component\HttpKernel\Exception\NotFoundHttpException("the product not existing");
        }
        
        $releases = $em->getRepository('ProdEvolBundle:Release')->findBy(array('product'=>$product));
        
        return $this->render('ProdEvolBundle:Product:view.html.twig', array(
            'product'=> $product//,
          //  'releases'=>$releases
        ));
    }
   
    /**
     * @Route("/Product/update/", name="product_update"))
     */
    public function updateAction()
    {
        return $this->render('ProdEvolBundle:Product:update.html.twig');
    }
    
    /**
     * @Route("/Product/test/", name="product_test"))
     */
    
   public function TestAction(Request $request)
    {
        $product = new Product();
        $release1 = new Release();
        $release2 = new Release();
        
        $product->setName("tstprod1");
        $product->setRemarks("coucou");
        $release1->setName("tstrel1");
        $release1->setLicenseInfo("gnu");
        $release1->setPublicationDate(new \DateTime());
        $release1->setProduct($product);
                
                
        $release2->setName("tstrel2");
        $release2->setLicenseInfo("gpl");
        $release2->setPublicationDate(new \DateTime());
        $release2->setProduct($product);
                
            $em = $this->getDoctrine()->getManager();
            $em->persist($product);
            $em->persist($release1);
            $em->persist($release2);
            
            $em->flush();
            return $this->redirectToRoute('product_list');
    }    
    
    
}
