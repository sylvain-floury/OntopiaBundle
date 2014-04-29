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
        $ontopia = $this->get('flosy_ontopia.core');

        
        $ontopia = $this->get('flosy_ontopia.core');
        $ontopia->getQueryPreProcessor()->setQuery('using o for i"http://psi.ontopedia.net/"
select $REF, $Nom, $Techno, $Culot, $Lumen, $EqWATT, $Couleur, $Kelvin ,$Marque  from
o:075 ($REF, $Nom),
o:015 ($REF: o:013, $Techno: o:014),
o:056 ($REF: o:054, $Marque: o:055),
o:578 ($REF: o:577, $Couleur: o:576),
o:005 ($REF, $Kelvin),
o:025 ($REF, $Lumen),
o:024 ($REF, $EqWATT),
o:007 ($REF: o:004, $Culot: o:006),
o:007 ($REF: o:004, o:156: o:006)
order by $Culot, $REF?');
        
        return array('content' => $ontopia->execute());
        
    }
}
