# CraftyAlgolia module for Craft CMS 3.x

A Crafty Algolia module

## Requirements

This module requires Craft CMS 3.1.0 or later.

## Installation

To install the module, follow these instructions.

First, you'll need to add the contents of the `app.php` file to your `config/app.php` (or just copy it there if it does not exist). This ensures that your module will get loaded for each request. The file might look something like this:
```
return [
    'modules' => [
        'craftyalgolia' => [
            'class' => \modules\delaneymethod\craftyalgolia\CraftyAlgolia::class,
            'components' => [
                'craftyAlgoliaService' => [
                    'class' => 'modules\delaneymethod\craftyalgolia\services\CraftyAlgoliaService',
                ],
            ],
        ],
    ],
    'bootstrap' => ['craftyalgolia'],
];
```
You'll also need to make sure that you add the following to your project's `composer.json` file so that Composer can find your module:

    "autoload": {
        "psr-4": {
          "modules\\delaneymethod\\craftyalgolia\\": "src/"
        }
    },

After you have added this, you will need to do:

    composer dump-autoload
 
 …from the project’s root directory, to rebuild the Composer autoload map. This will happen automatically any time you do a `composer install` or `composer update` as well.

## CraftyAlgolia Overview

-

## Using CraftyAlgolia

-

## CraftyAlgolia Roadmap

Some things to do, and ideas for potential features:

* Release it

Brought to you by [DelaneyMethod](http://www.delaneymethod.com)
