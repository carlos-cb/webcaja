<?php

namespace WebcajaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use WebcajaBundle\Entity\Data;
use WebcajaBundle\Entity\OrderInfo;
use WebcajaBundle\Entity\OrderItem;

class OrderController extends Controller
{
    public function carritoOrderinfoAction(Request $request)
    {
        $priceAll = $this->countAll();
        $priceIni = $priceAll;
        if($request->get('paytype')=='银行转账'){
            $priceAll= round($priceAll*0.98, 2);
        }
        //根据用户填写的表格新建订单
        if($request->getMethod() == 'POST' && ($priceAll!=0) ){
            //订单信息录入
            $orderInfo = new OrderInfo();
            $orderInfo->setUser($this->getUser())
                ->setOrderDate(new \DateTime('now'))
                ->setGoodsFee($priceIni)
                ->setShipFee(0)
                ->setTotalPrice($priceAll)
                ->setPayType($request->get('paytype'))
                ->setReceiverName($request->get('name'))
                ->setReceiverPhone($request->get('phonenumber'))
                ->setReceiverAdress($request->get('address'))
                ->setReceiverCity($request->get('city'))
                ->setReceiverProvince($request->get('province'))
                ->setReceiverPostcode($request->get('postcode'))
                ->setReceiverShuihao($request->get('shuihao'))
                ->setIsConfirmed(true)
                ->setIsSended(false)
                ->setIsOver(false)
                ->setState("运行中");

            //用户信息录入
            $repository = $this->getDoctrine()->getRepository('WebcajaBundle:Data');
            $existeData = $repository->findOneByUser($this->getUser());

            $em = $this->getDoctrine()->getManager();

            if($existeData){
                $existeData
                    ->setReceivername($request->get('name'))
                    ->setReceiverphone($request->get('phonenumber'))
                    ->setReceiveradress($request->get('address'))
                    ->setReceivercity($request->get('city'))
                    ->setReceiverprovince($request->get('province'))
                    ->setReceiverpostcode($request->get('postcode'))
                    ->setReceivershuihao($request->get('shuihao'));
                $em->persist($existeData);
            }else{
                $data = new Data();
                $data->setUser($this->getUser())
                    ->setReceivername($request->get('name'))
                    ->setReceiverphone($request->get('phonenumber'))
                    ->setReceiveradress($request->get('address'))
                    ->setReceivercity($request->get('city'))
                    ->setReceiverprovince($request->get('province'))
                    ->setReceiverpostcode($request->get('postcode'))
                    ->setReceivershuihao($request->get('shuihao'));
                $em->persist($data);
            }

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
