<?php

namespace Isics\BatchActionsBundle\Form\Type;

use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilder;


/**
* Type for batch actions management
*/
class BatchActionsType extends ChoiceType
{
    // Available actions
    protected $actions = array();
    
    // Options
    protected $options = array();
    
    /**
     * Constructor
     *
     * @param array $actions  Available actions
     * @param array $options  Options
     */
    public function __construct(array $actions, array $options = array())
    {
        $this->actions = $actions;
        
        $this->options = $options;
    }
    
    /**
     * @see Symfony\Component\Form\AbstractType
     */
    public function buildForm(FormBuilder $builder, array $options)
    {
        $options['choices'] = $this->actions;
        
        $options = array_merge($options, $this->options);
        
        parent::buildForm($builder, $options);
    }
    
    /**
     * @see Symfony\Component\Form\AbstractType
     */
    public function getParent(array $options)
    {
        return 'choice';
    }
    
    /**
     * @see Symfony\Component\Form\AbstractType
     */
    public function getName()
    {
        return 'isics_batch_action';
    }
}
