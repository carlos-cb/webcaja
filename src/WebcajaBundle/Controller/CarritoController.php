<?php

namespace WebcajaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Session\Session;

class CarritoController extends Controller
{
    public function carritoAction()
    {
        $cart = $this->getUser()->getCart();
        $cartItems = $cart->getCartItems();

        return $this->render('WebcajaBundle:Default:carrito.html.twig', array(
            'cartItems' => $cartItems,
        ));
    }

    public function addToCarritoAction($id)
    {
        $session = new Session();
        if(!$session->get('cartElements')){
            $session->set('cartElements', array());
        }

        $cart = $session->get('cartElements');
        if(!in_array($id, $cart)){
            array_push($cart, $id);
            $session->set('cartElements', $cart);
        }

        return $this->redirectToRoute('webcaja_carrito');
    }

    public function clearCarritoAction()
    {
        $session = new Session();
        $session->clear();

        return $this->redirectToRoute('webcaja_carrito');
    }

}
