<?php
namespace Flosy\Bundle\OntopiaBundle\Generator;

/**
 *
 * @author sylvain
 */
interface GeneratorInterface {
    
    /**
     * Generate tolog query
     * 
     * @return String Query as string.
     */
    public function generate();
}
