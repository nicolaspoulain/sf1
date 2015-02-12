<?php

namespace Nico\BlogBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class QuarkType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('content')
            ->add('parent')
            ->add('user_id')
            ->add('tagsText', 'text', array('attr' => array('class'=>'singleFieldTags'), 'required' => false, 'label' => 'Tags'))
            // ->add('created')
            // ->add('updated')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Nico\BlogBundle\Entity\Quark'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'nico_blogbundle_quark';
    }
}
