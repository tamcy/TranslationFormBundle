<?php

namespace A2lix\TranslationFormBundle\Form\EventListener;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;

class AutoFormListener implements EventSubscriberInterface
{
    /**
     * {@inheritdoc}
     */
    public static function getSubscribedEvents()
    {
        return [
            FormEvents::PRE_SET_DATA => 'preSetData',
        ];
    }

    /**
     * @param FormEvent $event
     */
    public function preSetData(FormEvent $event)
    {
        $form = $event->getForm();
        $formConfig = $form->getConfig();

        $fieldsOptions = $formConfig->getOptions();
        foreach ($fieldsOptions['fields'] as $fieldName => $fieldConfig) {
            $fieldType = isset($fieldConfig['field_type']) ? $fieldConfig['field_type'] : null;
            unset($fieldConfig['field_type']);

            $form->add($fieldName, $fieldType, $fieldConfig);
        }
    }
}
