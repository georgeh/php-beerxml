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

If you don't want to use the basic record classes from the `BeerXML\Record` namespace (say, you want to add some ABV
math or some Doctrine annotations so your recipe can easily save to a database) it's possible to specify the classes
that get generated. You'll need to implement the `BeerXML\Parser\I*Writer` interfaces in your classes, then subclass
`BeerXML\Parser\RecordFactory` to have it create your classes. Once you've got your objects set up, you can pass it into
the constructor of `BeerXML\Parser`


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

`BeerXML\Generator` will accept any record that implements the `BeerXML\Generator\I*Reader` interfaces.

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

If you don't use Composer, you can directly [download](https://github.com/georgeh/php-beerxml) the sources and configure
it with your autoloader.

License
=======

This software is free to use under the MIT license, but if you are happy with it I wouldn't mind one of your homebrews.

Copyright (c) 2013 George Hotelling

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in
all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
THE SOFTWARE.