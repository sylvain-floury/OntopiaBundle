<?php
namespace Flosy\Bundle\OntopiaBundle\Generator;

/**
 * Generate tolog query.
 *
 * @author sylvain
 */
class TologQueryGenerator implements GeneratorInterface {
    
    private $prefix;
    
    private $suffix;
    
    private $andFilters;
    
    private $orFilters;
    
    public function __construct() {
        $this->andFilters = array();
        $this->orFilters = array();
    }
    
    public function setPrefix($prefix) {
        $this->prefix = $prefix;
    }
    
    public function getPrefix() {
        return $this->prefix;
    }
    
    public function setSuffix($suffix) {
        $this->suffix = $suffix;
    }
    
    public function getSuffix() {
        return $this->suffix;
    }
    
    public function addFilter($filter) {
        $this->addAndFilter($filter);
    }
    
    public function addAndFilter($filter) {
        $this->andFilters[] = $filter;
    }
    
    public function getAndFilters() {
        return $this->andFilters;
    }
    
    public function addOrFilter($filter) {
        $this->orFilters[] = $filter;
    }
    
    public function getOrFilters() {
        return $this->orFilters;
    }
    
    public function generate() {
        $query = $this->prefix;
        
        foreach($this->andFilters as $filter) {
            $query .= ", ".$filter;
        }
        
        if(count($this->orFilters) > 1) {
            $query .= ', not({';
        
            foreach($this->orFilters as $filter) {
                $query .=  $filter . '|';
            }
            $query = substr($query, 0, -1);
            
            $query .= '})';
        }
        elseif(count($this->orFilters) == 1) {
            $query .= ', not('.$this->orFilters[0] . ')';
        }
        
        if($this->suffix) {
            $query .= " ".$this->suffix;
        }
        
        return $query;
    }

}
