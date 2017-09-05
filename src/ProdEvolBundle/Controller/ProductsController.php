<?php

namespace ProdEvolBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class ProductsController extends Controller
{
    /**
     * @Route("/Products/", name="products"))
     */
    public function indexAction()
    {
        return $this->render('ProdEvolBundle:Products:index.html.twig');
    }
    
    /**
     * @Route("/Products/list/", name="products_list"))
     */
    public function listAction()
    {
        return $this->render('ProdEvolBundle:Products:list.html.twig');
    }

    /**
     * @Route("/Products/add/", name="products_add"))
     */
    public function AddAction()
    {
        return $this->render('ProdEvolBundle:Products:add.html.twig');
    }
    
     /**
     * @Route("/Products/view/", name="products_view"))
     */
    public function viewAction()
    {
        return $this->render('ProdEvolBundle:Products:view.html.twig');
    }
   
    /**
     * @Route("/Products/update/", name="products_update"))
     */
    public function updateAction()
    {
        return $this->render('ProdEvolBundle:Products:update.html.twig');
    }
    
}
