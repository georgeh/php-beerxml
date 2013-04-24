php-beerxml
===========

A PHP parser and generator for the [BeerXML 1.0](http://www.beerxml.com/) standard.

Installation
============

Requires **PHP 5.3.0** or higher.

The easiest way is to install php-beerxml with [Composer](http://getcomposer.org/doc/00-intro.md).

Create a file named `composer.json` in your project root:

```json
{
    "require": {
        "georgeh/php-beerxml": "*",
    }
}
```

Then, run the following commands:

```bash
$ curl -s http://getcomposer.org/installer | php
$ php composer.phar install
```

If you don't use Composer, you can directly [download](https://github.com/georgeh/php-beerxml) the sources and configure it with your autoloader.
  
Usage
=====

Parser
------

```php
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
