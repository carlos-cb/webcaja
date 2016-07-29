<?php

namespace WebcajaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Session\Session;
use WebcajaBundle\Entity\CartItem;
use WebcajaBundle\Entity\Product;

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

    public function addToCarritoAction(Product $product)
    {
        $cart = $this->getUser()->getCart();
        
        $newCartItem = new CartItem();
        $newCartItem->setCart($cart)->setProduct($product)->setQuantity(1);
        
        if(!$cart->hasCartItem($newCartItem)){
            $em = $this->getDoctrine()->getManager();
            $em->persist($newCartItem);
            $em->flush();
        }
        
        return $this->redirectToRoute('webcaja_carrito');
    }

    public function clearCarritoAction()
    {
        $cart = $this->getUser()->getCart();
        $cartItems = $cart->getCartItems();

        $em = $this->getDoctrine()->getManager();
        foreach($cartItems as $cartItem){
            $em->remove($cartItem);
        }
        $em->flush();

        return $this->redirectToRoute('webcaja_carrito');
    }

    
}
