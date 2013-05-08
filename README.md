php-beerxml
===========

[![Build Status](https://travis-ci.org/georgeh/php-beerxml.png?branch=master)](https://travis-ci.org/georgeh/php-beerxml)
[![Coverage Status](https://coveralls.io/repos/georgeh/php-beerxml/badge.png?branch=master)](https://coveralls.io/r/georgeh/php-beerxml)

A PHP parser and generator for the [BeerXML 1.0](http://www.beerxml.com/) standard.

Usage
=====

Full API documentation is at http://georgeh.github.io/php-beerxml/

The unit tests in the tests/ directory provides some good examples as well.

Parser
------

```php
$parser = new \BeerXML\Parser();
$result = $parser->parse(file_get_contents('http://www.beerxml.com/recipes.xml'));
foreach ($result as $recipe) {
    /** @var $recipe \BeerXML\Record\Recipe **/
    echo "Found beer recipe " . $recipe->getName() . "\n";
}
```

Generator
---------

```php
$recipe = new \BeerXML\Record\Recipe();
$recipe->setName('My Brew');

$generator = new \BeerXML\Generator();
$generator->addRecord($recipe);
$xml = $generator->render();
echo $xml;
```

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