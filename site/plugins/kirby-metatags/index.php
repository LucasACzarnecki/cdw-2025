<?php

Kirby::plugin('guidoferreyra/kirby-metatags', [
    'blueprints' => [
        'tabs/seo' => __DIR__ . '/blueprints/tabs/seo.yml',
        'fields/basic_meta' => __DIR__ . '/blueprints/fields/basic_meta.yml',
        'fields/open_graph' => __DIR__ . '/blueprints/fields/open_graph.yml',
        'fields/twitter' => __DIR__ . '/blueprints/fields/twitter.yml',
        'fields/robots' => __DIR__ . '/blueprints/fields/robots.yml',
        'fields/favicon' => __DIR__ . '/blueprints/fields/favicon.yml',
    ],
    'snippets' => [
        'meta_information' => __DIR__ . '/snippets/meta_information.php',
        'robots' => __DIR__ . '/snippets/robots.php'
    ],
    'areas' => [
        'seo' => function () {
            return [
                'label' => "Meta (SEO)",
                'icon'  => 'search',
                'menu'  => true,
                'link'  => 'site?tab=seo',
                'current' => function () {
                    return Str::contains(kirby()->request()->url(), 'site?tab=seo');
                }
            ];
        },
    ],
    'routes' => [
        [
            'pattern' => 'manifest.webmanifest',
            'action'  => function () {
                // MANIFEST JSON ROUTE
                $data = array(
                    'name' => site()->title()->value(),
                    'short_name' => site()->title()->value(),
                    'display' => 'standalone',
                );

                if (site()->themeColor()->isNotEmpty()) {
                    $data['theme_color'] = site()->themeColor()->value();
                    $data['background_color'] = site()->themeColor()->value();
                }

                $iconSizes = [192, 512];
                if (site()->favicon()->isNotEmpty()) {
                    $icons = array();
                    foreach ($iconSizes as $size) {
                        $image = site()->favicon()->toFile()->thumb(['width' => $size]);
                        $icon = array(
                            'src' => $image->url(),
                            'sizes' => $size."x".$size,
                            'type' => $image->mime()
                        );
                        array_push($icons, $icon);
                    }

                    $data['icons'] = $icons;
                }

                return response::json($data) ;
            }
        ],
    ]
]);