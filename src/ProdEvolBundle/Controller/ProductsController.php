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
    
}
