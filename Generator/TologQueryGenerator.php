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
    
    private $filters;
    
    public function __construct() {
        $this->filters = array();
        
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
        $this->filters[] = $filter;
    }
    
    public function getFilters() {
        return $this->filters;
    }
    
    public function generate() {
        $query = $this->prefix;
        
        foreach($this->filters as $filter) {
            $query .= ", ".$filter;
        }
        
        $query .= " ".$this->suffix;
        
        return $query;
    }

}
