<?php

namespace A2lix\TranslationFormBundle\Form\Type;

use A2lix\TranslationFormBundle\Form\EventListener\AutoFormListener;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * @author David ALLIX
 */
class AutoFormType extends AbstractType
{
    /** @var AutoFormListener */
    private $autoFormListener;

    /**
     * @param AutoFormListener $autoFormListener
     */
    public function __construct(AutoFormListener $autoFormListener)
    {
        $this->autoFormListener = $autoFormListener;
    }

    /**
     * @param FormBuilderInterface $builder
     * @param array                $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->addEventSubscriber($this->autoFormListener);
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'fields' => [],
            'excluded_fields' => [],
        ]);
    }
}
