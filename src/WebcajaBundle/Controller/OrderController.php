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
            $name = $request->get('name');
            $orderInfo = new OrderInfo();
            $orderInfo->setUser($this->getUser())
                ->setOrderDate(new \DateTime('now'))
                ->setGoodsFee(1)
                ->setTotalPrice(1)
                ->setShipFee(0)
                ->setPayType("到付")
                ->setReceiverName($name)
                ->setReceiverPhone(1)
                ->setReceiverAdress(1)
                ->setReceiverCity(1)
                ->setReceiverProvince(1)
                ->setReceiverPostcode(1)
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
