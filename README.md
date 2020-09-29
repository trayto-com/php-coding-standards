# trayto.com | PHP Coding Standards

Common coding-standard utils, tools and rules used across our PHP projects in trayto.com

[symplify/easy-coding-standard (ECS)](https://github.com/symplify/easy-coding-standard) is used under the hood.
Follow configuration instructions there. Phar version is used so there should be no conflicts with projects dependencies.

Further reading:
- [How to Migrate From PHP_CodeSniffer to EasyCodingStandard in 7 Steps](https://tomasvotruba.com/blog/2018/06/04/how-to-migrate-from-php-code-sniffer-to-easy-coding-standard/#comment-4086561141)
- [How to Migrate From PHP CS Fixer to EasyCodingStandard in 6 Steps](https://tomasvotruba.com/blog/2018/06/07/how-to-migrate-from-php-cs-fixer-to-easy-coding-standard/)

## Installation instructions

```
composer require --dev trayto-com/php-coding-standards
```

## Usage

You can use ECS directly in CLI but we do recommends to customise default rules:
```
$ vendor/bin/ecs check src tests --config vendor/trayto-com/php-coding-standards/definitions/ecs-default.php
```

### Customise rules and custom usage

Recommended is to create your own configuration for project and define cache folder for EasyCodingStandard as well.

 Create php file in your project root, for example `ecs.php`:
```php
<?php declare(strict_types=1);

use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;

return static function (ContainerConfigurator $configurator): void {
    // make sure you import correct file
	$configurator->import(__DIR__ . '/vendor/trayto-com/php-coding-standards/definitions/ecs-default.php');

	$services = $configurator->services();
	// ... customise your services

	$parameters = $configurator->parameters();
	// .. customise your parameters

	$parameters->set(
		Option::CACHE_DIRECTORY,
		__DIR__ . '/temp/ecs'
	);
};
```
