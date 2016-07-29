<?php

namespace WebcajaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use WebcajaBundle\Entity\OrderInfo;

class OrderController extends Controller
{
    /**
     * Creates a new OrderInfo entity.
     *
     */
    public function carritoToOrderAction()
    {

    }

    public function carritoOrderinfoAction(Request $request)
    {
        $data = $request->get('val1');
        $p1 = $data;
        
        $orderInfo = new OrderInfo();
        $form = $this->createForm('WebcajaBundle\Form\OrderInfoClientType', $orderInfo);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($orderInfo);
            $em->flush();

            return $this->redirectToRoute('webcaja_carritoToOrder', array('id' => $orderInfo->getId()));
        }

        return $this->render('WebcajaBundle:Default:carritoOrderinfo.html.twig', array(
            'orderInfo' => $orderInfo,
            'form' => $form->createView(),
            'p1' => $p1,
        ));
    }
}
