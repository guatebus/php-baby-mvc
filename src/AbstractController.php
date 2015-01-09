<?php

/**
 * Description of AbstractController
 *
 * @author odin
 */
abstract class AbstractController 
{
    protected $name;
    
    public function __construct($name)
    {
        $this->name = $name;
    }

    abstract public function execute();
    
    public function renderTemplate(array $vars = array())
    {
        $path = __DIR__ . '/View/' . $this->name . '.phtml';
        
        if (!file_exists($path)) {
            throw new \LogicException(sprintf('The file %s was not found to render the template.', $path));
        }
        
        require $path;
    }
}
