<?php

namespace WebcajaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('WebcajaBundle:Default:index.html.twig');
    }

    public function backEndAction()
    {
        return $this->render('WebcajaBundle:BackEnd:overview.html.twig');
    }
    
    public function categoryListAction()
    {
        $em = $this->getDoctrine()->getManager();

        $categories = $em->getRepository('WebcajaBundle:Category')->findAll();

        return $this->render('WebcajaBundle:Default:categoryList.html.twig', array(
            'categories' => $categories,
        ));
    }

    public function productListAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $query = $em->createQuery("SELECT p FROM WebcajaBundle:Product p WHERE p.category=$id");
        $products = $query->getResult();

        return $this->render('WebcajaBundle:Default:productList.html.twig', array(
            'products' => $products,
        ));
    }
    
    public function carritoAction()
    {
        return $this->render('WebcajaBundle:Default:carrito.html.twig');
    }
}
