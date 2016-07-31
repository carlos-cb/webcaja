<?php

namespace WebcajaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use WebcajaBundle\Entity\OrderInfo;

class OrderController extends Controller
{
    public function carritoOrderinfoAction(Request $request)
    {
        if($request->getMethod() == 'POST'){
            $orderInfo = new OrderInfo();
            $orderInfo->setUser($this->getUser())
                ->setOrderDate(new \DateTime('now'))
                ->setGoodsFee(1)
                ->setTotalPrice(1)
                ->setShipFee(0)
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
        }
        return $this->redirectToRoute('webcaja_carrito');
    }
}
