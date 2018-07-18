<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PerfilUsuarioType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nombre')
            ->add('imagenHeader', FileType::class,array(
                "label" => "Imagen:",
                "attr" =>array("class" => "form-control")
            ))
            ->add('imagenAvatar', FileType::class,array(
                "label" => "Imagen:",
                "attr" =>array("class" => "form-control")
            ))
            ->add('descripcion', TextareaType::class, array(
                'attr' => array('class' => 'form-control')))
            ->add('profesion')
            ->add('user');
    }/**
 * {@inheritdoc}
 */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\PerfilUsuario'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_perfilusuario';
    }


}
