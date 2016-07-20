<?php

namespace WebcajaBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserType extends AbstractType
{

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('username', 'text', array('label' => '用户名'))
            ->add('email', 'text', array('label' => '邮箱'))
            ->add('enabled', 'checkbox', array('required' => false, 'label' => '可使用',))
            ->add('plain_password', 'password', array(
                'required' => false,
                'label' => '密码',
            ))
            ->add('roles', 'choice', array(
                'label' => '用户规则',
                'choices' => array(
                    'ROLE_USER' => '普通用户',
                    'ROLE_ADMIN' => '普通管理员',
                    'ROLE_SUPER_ADMIN' => '最高管理员',
                ),
                'multiple' => true,
                'expanded' => true,
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
            'data_class' => 'WebcajaBundle\Entity\User'
        ));
    }
}
