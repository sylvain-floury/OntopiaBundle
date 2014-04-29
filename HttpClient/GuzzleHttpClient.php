<?php
namespace Flosy\Bundle\OntopiaBundle\HttpClient;

use Flosy\Bundle\OntopiaBundle\HttpClient\HttpClientInterface;
use GuzzleHttp\Client;

/**
 * Description of GuzzleHttpClient
 *
 * @author sylvain
 */
class GuzzleHttpClient implements HttpClientInterface {
    
    protected $httpClient;
    
    protected $htaccessLogin;
    
    protected $htaccessPassword;
    
    protected $url;
    
    public function __construct() {
        $this->httpClient = new Client();
    }

    public function setHtaccessLogin($htaccessLogin) {
        $this->htaccessLogin = $htaccessLogin;
    }
    
    public function setHtaccessPassword($htaccessPassword) {
        $this->htaccessPassword = $htaccessPassword;
    }
    
    public function setUrl($url) {
        $this->url = $url;
    }

    public function execute() {
        $response = $this->httpClient->get($this->url, [
            'auth' =>  [$this->htaccessLogin, $this->htaccessPassword]
        ]);     

        return $response->getBody();
    }
}
