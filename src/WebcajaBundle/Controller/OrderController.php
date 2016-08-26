<?php

namespace WebcajaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use WebcajaBundle\Entity\OrderInfo;
use WebcajaBundle\Entity\OrderItem;

class OrderController extends Controller
{
    public function carritoOrderinfoAction(Request $request)
    {
        $priceAll = $this->countAll();
        if($priceAll>=500){
            $priceAll= $priceAll*0.95;
        }
        if($request->get('paytype')=='银行转账'){
            $priceAll= $priceAll*0.98;
        }
        //根据用户填写的表格新建订单
        if($request->getMethod() == 'POST'){
            $orderInfo = new OrderInfo();
            $orderInfo->setUser($this->getUser())
                ->setOrderDate(new \DateTime('now'))
                ->setGoodsFee($priceAll)
                ->setShipFee(0)
                ->setTotalPrice($priceAll)
                ->setPayType($request->get('paytype'))
                ->setReceiverName($request->get('name'))
                ->setReceiverPhone($request->get('phonenumber'))
                ->setReceiverAdress($request->get('address'))
                ->setReceiverCity($request->get('city'))
                ->setReceiverProvince($request->get('province'))
                ->setReceiverPostcode($request->get('postcode'))
                ->setIsConfirmed(true)
                ->setIsSended(false)
                ->setIsOver(false)
                ->setState("运行中");
            $em = $this->getDoctrine()->getManager();
            $em->persist($orderInfo);
            $em->flush();

            //将购物车商品全部倒入订单中
            $cleanCart = $this->itemToOrder($orderInfo);

            //清空购物车的所有商品并且状态改为已生成订单
            $this->clearCarrito();

            $cart = $this->getUser()->getCart();
            $cart->setCartState('over');

            $em->flush();
        }else{
            return $this->redirectToRoute('webcaja_carrito');
        }

        return $this->render('WebcajaBundle:Default:carritoOrderinfo.html.twig', array(
            'orderInfo' => $orderInfo,
        ));
    }
    
    private function itemToOrder(OrderInfo $orderInfo)
    {
        $user = $this->getUser();
        $cartItems = $user->getCart()->getCartItems();
        $em = $this->getDoctrine()->getManager();

        foreach($cartItems as $cartItem)
        {
            $orderItem = new OrderItem();
            $orderItem->setQuantity($cartItem->getQuantity())
                      ->setOrderInfo($orderInfo)
                      ->setProduct($cartItem->getProduct());
            $orderInfo->addOrderItem($orderItem);

            $em->persist($orderItem);
        }
        $em->flush();
    }

    public function clearCarrito()
    {
        $cart = $this->getUser()->getCart();
        $cartItems = $cart->getCartItems();

        $em = $this->getDoctrine()->getManager();
        foreach($cartItems as $cartItem){
            $cart->removeCartItem($cartItem);
            $em->remove($cartItem);
        }
        $em->flush();
    }

    private function countAll()
    {
        $user = $this->getUser();
        $cartItems = $user->getCart()->getCartItems();
        $priceall = 0;

        foreach($cartItems as $cartItem)
        {
            $priceall += ($cartItem->getQuantity() * $cartItem->getProduct()->getUnit() * $cartItem->getProduct()->getPrice());
        }
        return $priceall;
    }
}
