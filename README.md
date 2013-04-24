php-beerxml
===========

A PHP parser and generator for the [BeerXML](http://www.beerxml.com/) standard.

Installing
==========

Add `"georgeh/php-beerxml"` to your composer.json and run `composer update`. Not using Composer? Get it at http://getcomposer.org/
  
Usage
=====

Parser
------

```php
require_once('vendor/autoload.php');

$parser = new \BeerXML\Parser();
$parser->setXmlString(file_get_contents('http://www.beerxml.com/recipes.xml'));
$result = $parser->parse();
foreach ($result as $recipe) {
    /** @var $recipe \BeerXML\Record\Recipe **/
    echo "Found beer recipe " . $recipe->getName() . "\n";
}
```

Generator
---------

Coming soon!