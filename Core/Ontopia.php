<?php
namespace Flosy\Bundle\OntopiaBundle\Core;

use \Flosy\Bundle\OntopiaBundle\PreProcessor\QueryPreProcessor;
/**
 * Description of Ontopia
 *
 * @author sylvain
 */
class Ontopia {
    
    protected $queryPreProcessor;
    
    protected $httpClient;
    
    protected $transformer;
    
    public function __construct(QueryPreProcessor $queryPreProcessor, $httpClient, $transformer) {
        $this->queryPreProcessor = $queryPreProcessor;
        $this->httpClient = $httpClient;
        $this->transformer = $transformer;
    }
    
    /**
     * 
     * @return \Flosy\Bundle\OntopiaBundle\PreProcessor\QueryPreProcessor
     */
    public function getQueryPreProcessor() {
        return $this->queryPreProcessor;
    }
    
    public function getHttpĈlient() {
        return $this->httpClient;
    }
    
    public function getTransformer() {
        return $this->transformer;
    }
    
    public function execute() {
        $this->getHttpĈlient()->setUrl($this->getQueryPreProcessor()->getQueryUrl());
        $this->getTransformer()->import($this->getHttpĈlient()->execute());
        return $this->getTransformer()->transform();
    }
}
