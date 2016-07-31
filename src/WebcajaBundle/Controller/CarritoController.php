<?php

namespace WebcajaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use WebcajaBundle\Entity\CartItem;
use WebcajaBundle\Entity\Product;
use Symfony\Component\HttpFoundation\Request;

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
        $cart->addCartItem($newCartItem);
        
        if($cart->hasCartItem($newCartItem)){
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

    public function ajaxUpdateAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $isAdd = $request->get('val1');
        $cartItemId = $request->get('val2');

        $repository = $this->getDoctrine()->getRepository('WebcajaBundle:CartItem');
        $cartItem = $repository->find($cartItemId);
        $cartItem->setQuantity($cartItem->getQuantity()+$isAdd);

        $em->persist($cartItem);
        $em->flush();

        return $this->redirectToRoute('webcaja_carrito');
    }
}
