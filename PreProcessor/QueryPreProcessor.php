<?php
namespace Flosy\Bundle\OntopiaBundle\PreProcessor;

/**
 * Description of Query
 *
 * @author sylvain
 */
class QueryPreProcessor {
    
    
    protected $ontopiaUrl;
    
    protected $topicmap;
    
    protected $queryUrl;
    
    protected $query;
    
    
    public function __construct($ontopiaUrl, $topicmap) {
        $this->ontopiaUrl = $ontopiaUrl;
        $this->topicmap = $topicmap;
    }
    
    public function setQuery($query) {
        $this->query = $query;
    }
    
    public function getQueryUrl() {
        $this->queryUrl  = $this->ontopiaUrl;
        $this->queryUrl .= '&query='. urlencode($this->query); 
        $this->queryUrl .= "&tm=" . $this->topicmap;
        return $this->queryUrl;
    }

}
