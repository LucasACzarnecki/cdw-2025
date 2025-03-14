<?php

Kirby::plugin('lucasczarnecki/arenablocks', [

    'blueprints' => [
        'blocks/slider' => __DIR__ . '/blueprints/blocks/slider.yml',
        'blocks/scheduleblock' => __DIR__ . '/blueprints/blocks/scheduleblock.yml',
        'blocks/eventblock' => __DIR__ . '/blueprints/blocks/eventblock.yml'
    ],
    'snippets' => [
        'blocks/slider' => __DIR__ . '/snippets/blocks/slider.php',
        'blocks/scheduleblock' => __DIR__ . '/snippets/blocks/scheduleblock.php',
        'blocks/eventblock' => __DIR__ . '/snippets/blocks/eventblock.php'
    ]
]);