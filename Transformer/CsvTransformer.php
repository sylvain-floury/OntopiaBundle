<?php
namespace Flosy\Bundle\OntopiaBundle\Transformer;

use Flosy\Bundle\OntopiaBundle\Transformer\TransformerInterface;

/**
 * Description of CsvTRansformer
 *
 * @author sylvain
 */
class CsvTransformer implements TransformerInterface {
    
    protected $csvString;
    
    protected $csvArray = array();
    
    public function import($inputStream) {
        
        $inputStream = utf8_encode($inputStream);
        
        $tmp = explode("\n", $inputStream);
        
        for($i = 0; $i < count($tmp); $i++)
        {
            if(!empty($tmp[$i])) {
                $this->csvArray[] = str_getcsv($tmp[$i]);
            }
        }
        
    }
    
    public function transform(){
        
        return $this->csvArray;
    }
    
    /**
     * Return input stream.
     * 
     * @return String
     */
    public function getCsvString()
    {
        return $this->csvString;
    }
}
