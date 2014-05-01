<?php
namespace Flosy\Bundle\OntopiaBundle\Transformer;

/**
 *
 * @author sylvain
 */
interface TransformerInterface {
    
    /**
     * Import input stream.
     * 
     * @param String $inputStream
     */
    public function import($inputStream);
    
    /**
     * Transform input stream to array.
     * 
     * @return array 
     */
    public function transform();
}
