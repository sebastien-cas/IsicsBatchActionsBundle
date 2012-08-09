<?php

namespace Isics\BatchActionsBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\RadioType;
use Symfony\Component\Form\FormBuilder;

use Isics\BatchActionsBundle\Form\Type\BatchActionsType;
use Isics\BatchActionsBundle\Model\BatchCollection;

/**
* Form type for batch actions form
*/
class BatchType extends AbstractType
{
    // Available elements
    protected $elements = array();
    
    // Available actions
    protected $actions = array();
    
    /**
     * Constructor
     *
     * @param BatchCollection $elements  Collection of checkable elements in batch actions type
     */
    public function __construct(BatchCollection $collection)
    {
        // Les éléments
        foreach ($collection->getAvailableElements() as $key => $element) {
            $this->addElement($key, $element);
        }
        
        // Les actions
        foreach ($collection->getAvailableActions() as $key => $action) {
            $this->addAction($key, $action);
        }
    }
    
    /**
     * Add an element to element list
     *
     * @param string $index  Index
     * @param string $element  Element
     */
    public function addElement($index, $element)
    {
        $this->elements[$index] = $element;
    }
    
    /**
     * Add an available action to action list
     *
     * @param string $index  Index
     * @param string $action  Action
     */
    public function addAction($index, $action)
    {
        $this->actions[$index] = $action;
    }
    
    /**
     * @see Symfony\Component\Form\AbstractType
     */
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder->add('elements', 'choice', array(
            'label'         => 'Elements',
            'choices'       => $this->elements,
            'expanded'      => true,
            'multiple'      => true,
            'required'      => true
        ));
        
        $builder->add('action', new BatchActionsType($this->actions, array(
            'label'         => 'Action',
            'expanded'      => false,
            'multiple'      => false
        )));
    }
    
    /**
     * @see Symfony\Component\Form\AbstractType
     */
    public function getDefaultOptions(array $options)
    {
        return array(
            'data_class' => 'Isics\BatchActionsBundle\Model\BatchCollection'
        );
    }
    
    /**
     * @see Symfony\Component\Form\AbstractType
     */
    public function getName()
    {
        return 'isics_batch';
    }
}
