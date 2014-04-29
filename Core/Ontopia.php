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
    
    public function __construct(QueryPreProcessor $queryPreProcessor, $httpClient) {
        $this->queryPreProcessor = $queryPreProcessor;
        $this->httpClient = $httpClient;
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
    
    public function execute() {
        $this->getHttpĈlient()->setUrl($this->getQueryPreProcessor()->getQueryUrl());
        return $this->getHttpĈlient()->execute();
    }
}
