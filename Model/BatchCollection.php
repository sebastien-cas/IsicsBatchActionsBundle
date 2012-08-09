<?php

namespace Isics\BatchActionsBundle\Model;

/**
 * Model to manage object collection for batch actions form type
 *
 * @author Julien POTTIER<julien.pottier@isics.fr>
 */
class BatchCollection
{
    // Available elements
    protected $availableElements = array();
    
    // Available actions
    protected $availableActions = array();
    
    // Checked elements
    protected $elements = array();
    
    // Chosen action
    protected $action;
    
    /**
     * Model construction
     *
     * @param mixed $availableElements  Traversable list of available elements
     * @param array $availableActions  Available actions
     */
    public function __construct($availableElements, array $availableActions = array())
    {
        $this->availableElements = $availableElements;
        $this->availableActions = $availableActions;
    }
    
    /**
     * Get all available elements
     *
     * @return mixed  Available elements
     */
    public function getAvailableElements()
    {
        return $this->availableElements;
    }
    
    /**
     * Get available actions
     *
     * @return array  Available actions
     */
    public function getAvailableActions()
    {
        return $this->availableActions;
    }
    
    /**
     * Set checked elements (called by type when binding request parameters)
     *
     * @param array $elements  Checked elements
     */
    public function setElements(array $elements)
    {
        foreach ($elements as $elementKey) {
            if (isset($this->availableElements[$elementKey])) {
                $this->elements[] = $this->availableElements[$elementKey];
            }
        }
    }
    
    /**
     * Get checked elements
     *
     * @return array  Checked elements
     */
    public function getElements()
    {
        return $this->elements;
    }
    
    /**
     * Set chosen action for elements (called by type when binding request parameters)
     *
     * @param string $action  Action
     */
    public function setAction($action)
    {
        $this->action = $action;
    }
    
    /**
     * Get chosen action
     *
     * @return string  Action
     */
    public function getAction()
    {
        return $this->action;
    }
}