<?php

namespace WebcajaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use WebcajaBundle\Entity\Cart;


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

        $cart = $this->getUser()->getCart();
        if(!$cart) {
            $cart = new Cart();
            $cart->setCartState('buying')
                ->setCreateDate(new \DateTime('now'))
                ->setUser($this->getUser());
            $em = $this->getDoctrine()->getManager();
            $em->persist($cart);
            $em->flush();
        }
        else if($cart->getCartState() == 'over')
        {
            $cart->setCartState('buying')
                ->setCreateDate(new \DateTime('now'));

            $em = $this->getDoctrine()->getManager();
            $em->persist($cart);
            $em->flush();
        }
        return $this->render('WebcajaBundle:Default:categoryList.html.twig', array(
            'categories' => $categories,
        ));
    }

    public function productListAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $cart = $this->getUser()->getCart();
        $cartItems = $cart->getCartItems();

        $query = $em->createQuery("SELECT p FROM WebcajaBundle:Product p WHERE p.category=$id");
        $products = $query->getResult();

        return $this->render('WebcajaBundle:Default:productList.html.twig', array(
            'products' => $products,
            'cartItems' => $cartItems,
        ));
    }

    public function infoAction()
    {
        return $this->render('WebcajaBundle:Default:info.html.twig');
    }
}
