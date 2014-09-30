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
    
      private $norFilters;
    
    public function __construct() {
        $this->andFilters = array();
        $this->orFilters = array();
        $this->norFilters = array();
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
    
    public function addNorFilter($filter) {
        $this->norFilters[] = $filter;
    }
    
    public function getNorFilters() {
        return $this->norFilters;
    }
    
    public function addOrFilter($filter) {
        $this->orFilters[] = $filter;
    }
    
    public function getOrFilters() {
        return $this->orFilters;
    }
    
    public function generate() {
        $query = $this->prefix . ", ";
        
        foreach($this->andFilters as $filter) {
            $query .= $filter. ", ";
        }
        
        if($this->orFilters) {
            $query .= $this->generateOrFilters($this->orFilters).', ';
        }
        
        if($this->norFilters) {
            $query .= 'not('.$this->generateOrFilters($this->norFilters).'), ';
        }
        
        $query = substr($query, 0, -2);
        
        if($this->suffix) {
            $query .= " ".$this->suffix;
        }
        
        return $query;
    }
    
    protected function generateOrFilters($orFilters) {
        $query = '';
        if(count($orFilters) > 1) {
            $query .= '{';
        
            foreach($orFilters as $filter) {
                $query .=  $filter . '|';
            }
            $query = substr($query, 0, -1);
            
            $query .= '}, ';
        }
        elseif(count($orFilters) == 1) {
            $query .= $orFilters[0]. ", ";
        }
        
        return substr($query, 0, -2);
    }

}
