<?php

$finder = (new PhpCsFixer\Finder())
    ->in(__DIR__)
    ->exclude('var')
    ;

return (new PhpCsFixer\Config())
    ->setRules([
        '@Symfony' => true,
        'single_blank_line_at_eof' => true,
    ])
    ->setFinder($finder)
    ;