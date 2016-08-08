<?php

namespace WebcajaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use WebcajaBundle\Entity\CartItem;
use WebcajaBundle\Entity\Product;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

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

        if(!$cart->hasCartItem($product)){
            $em = $this->getDoctrine()->getManager();
            $cart->addCartItem($newCartItem);
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

        return new Response();
    }
    
    public function addtocartAjaxAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $cart = $this->getUser()->getCart();
        
        //获取ajax参数
        $num = $request->get('num');
        $productId = $request->get('id');

        //获取product实体
        $repository = $this->getDoctrine()->getRepository('WebcajaBundle:Product');
        $product = $repository->find($productId);
        
        //新增购物车商品实体
        $newCartItem = new CartItem();
        $newCartItem->setCart($cart)->setProduct($product)->setQuantity($num);

        $cart->addCartItem($newCartItem);
        $em->persist($newCartItem);
        $em->flush();

        return new Response();
    }

}
