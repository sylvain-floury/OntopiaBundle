<?php

namespace Flosy\Bundle\OntopiaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use GuzzleHttp\Client;

class DefaultController extends Controller
{
    /**
     * @Route("/")
     * @Template()
     */
    public function indexAction()
    {
        $client = new Client();
        $response = $client->get('http://ontopiatest.proximit.fr/', [
    'auth' =>  ['ontopia', 'OnTopIA214#KeYPxx..']
]);
        
        return array('content' => $response->getBody());
    }
}
