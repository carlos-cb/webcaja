<?php

namespace WebcajaBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;

class ProductType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', 'text', array('label' => '产品名'))
            ->add('nameEs', 'text', array('label' => '产品名西语'))
            ->add('category', null, array(
                'label' => '所属分类',
                'class' => 'WebcajaBundle:Category',
                'property' => 'name',
             ))
            ->add('unit', null, array('label' => '每包个数'))
            ->add('code', 'text', array('label' => '产品编号'))
            ->add('stock', null, array('label' => '产品库存'))
            ->add('price', null, array('label' => '产品单价'))
            ->add('description', 'text', array('label' => '产品描述', 'required' => false))
            ->add('foto', FileType::class, array(
                'label' => '产品图片',
                'data_class' => null,
                'required' => false,
            ))
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'WebcajaBundle\Entity\Product'
        ));
    }
}
