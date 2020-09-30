<?php

declare(strict_types=1);

use PhpCsFixer\Fixer\Basic\NonPrintableCharacterFixer;
use PhpCsFixer\Fixer\Strict\DeclareStrictTypesFixer;
use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
use Symplify\EasyCodingStandard\ValueObject\Option;

$genericCodingStandards = static function (ContainerConfigurator $containerConfigurator): void {
	$parameters = $containerConfigurator->parameters();
	$parameters->set(
		Option::SETS,
		[
			'psr12',
			'common',
		]
	);
	$parameters->set(Option::LINE_ENDING, '\n');
	$parameters->set(Option::INDENTATION, Option::INDENTATION_TAB);
};


return static function (ContainerConfigurator $containerConfigurator) use (
	$genericCodingStandards
): void {
	$genericCodingStandards($containerConfigurator);

	$services = $containerConfigurator->services();
	$parameters = $containerConfigurator->parameters();

	$services->set(DeclareStrictTypesFixer::class)
		->property('spacesCountAroundEqualsSign', 0);

	$services->set(NonPrintableCharacterFixer::class);
};
