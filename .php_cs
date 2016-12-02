<?php
/*
 * This file is part of the TYPO3 CMS project.
 *
 * It is free software; you can redistribute it and/or modify it under
 * the terms of the GNU General Public License, either version 2
 * of the License, or any later version.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * The TYPO3 project - inspiring people to share!
 */

/**
 * This file represents the configuration for Code Sniffing PSR-2-related
 * automatic checks of coding guidelines
 * Install @fabpot's great php-cs-fixer tool via
 *
 *  $ composer global require fabpot/php-cs-fixer
 *
 * And then simply run
 *
 *  $ php-cs-fixer fix --config-file .php_cs
 *
 * inside the TYPO3 directory. Warning: This may take up to 10 minutes.
 *
 * For more information read:
 * http://www.php-fig.org/psr/psr-2/
 * http://cs.sensiolabs.org
 */

if (PHP_SAPI !== 'cli') {
    die('This script supports command line usage only. Please check your command.');
}

if (function_exists('xdebug_disable')) {
    xdebug_disable();
}

// Define in which folders to search and which folders to exclude
// Exclude some directories that are excluded by Git anyways to speed up the sniffing
$finder = Symfony\CS\Finder\DefaultFinder::create()
    ->exclude('vendor')
    ->exclude('Contrib')
    ->in(__DIR__);

// Return a Code Sniffing configuration using
// all sniffers needed for PSR-2 and additional
// fixers to match TYPO3 coding guidelines
return Symfony\CS\Config\Config::create()
    ->level(Symfony\CS\FixerInterface::PSR2_LEVEL)
    ->fixers([
        'remove_leading_slash_use',
        'single_array_no_trailing_comma',
        'spaces_before_semicolon',
        'unused_use',
        'concat_with_spaces',
        'whitespacy_lines',
        'ordered_use',
        'single_quote',
        'duplicate_semicolon',
        'extra_empty_lines',
        'phpdoc_no_package',
        'phpdoc_scalar',
        'no_empty_lines_after_phpdocs',
        'short_array_syntax',
        'array_element_white_space_after_comma',
        'function_typehint_space',
        'hash_to_slash_comment',
        'join_function',
        'lowercase_cast',
        'namespace_no_leading_whitespace',
        'native_function_casing',
        'no_empty_statement',
        'self_accessor',
        'short_bool_cast',
        'unneeded_control_parentheses',
    ])
    ->setUsingCache(true)
    ->finder($finder);
