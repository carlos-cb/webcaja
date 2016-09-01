<?php

namespace WebcajaBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class OrderInfoType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('orderDate', 'datetime')
            ->add('goodsFee')
            ->add('totalPrice')
            ->add('shipFee')
            ->add('payType')
            ->add('receiverName')
            ->add('receiverPhone')
            ->add('receiverAdress')
            ->add('receiverCity')
            ->add('receiverProvince')
            ->add('receiverPostcode')
            ->add('shuihao')
            ->add('isConfirmed')
            ->add('isSended')
            ->add('isOver')
            ->add('state')
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'WebcajaBundle\Entity\OrderInfo'
        ));
    }
}
