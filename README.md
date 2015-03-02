OntopiaBundle
=============

## Installation

### From GitHub

Clone the Bundle.

Composer

Add to composer.json
   "require": {
      "guzzlehttp/guzzle": "4.*"
   }

## Routing

If you want to use the application add this to `routing.yml`.

``` yml
flosy_ontopia:
    resource: "@FlosyOntopiaBundle/Controller/"
    type:     annotation
    prefix:   /ontopia
```

/app/AppKernel.php
``` php
$bundles = array(
...
new Flosy\Bundle\OntopiaBundle\FlosyOntopiaBundle(),
)
```

Configure @FlosyOntopiaBundle/Resources/config/service.xml
