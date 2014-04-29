<?php
namespace Flosy\Bundle\OntopiaBundle\HttpClient;

/**
 * Description of HttpClientInterface
 *
 * @author sylvain
 */
interface HttpClientInterface {
    
    public function setUrl($url);
    
    /**
     * @return string
     */
    public function execute();
}
