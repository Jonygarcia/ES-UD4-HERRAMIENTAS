<?php return array(
    'root' => array(
        'name' => 'dwes/log',
        'pretty_version' => 'dev-main',
        'version' => 'dev-main',
        'reference' => 'fc932525940f460b4631a0bc770420fe8b4652b0',
        'type' => 'project',
        'install_path' => __DIR__ . '/../../',
        'aliases' => array(),
        'dev' => true,
    ),
    'versions' => array(
        'dwes/log' => array(
            'pretty_version' => 'dev-main',
            'version' => 'dev-main',
            'reference' => 'fc932525940f460b4631a0bc770420fe8b4652b0',
            'type' => 'project',
            'install_path' => __DIR__ . '/../../',
            'aliases' => array(),
            'dev_requirement' => false,
        ),
        'monolog/monolog' => array(
            'pretty_version' => '3.2.0',
            'version' => '3.2.0.0',
            'reference' => '305444bc6fb6c89e490f4b34fa6e979584d7fa81',
            'type' => 'library',
            'install_path' => __DIR__ . '/../monolog/monolog',
            'aliases' => array(),
            'dev_requirement' => false,
        ),
        'psr/log' => array(
            'pretty_version' => '3.0.0',
            'version' => '3.0.0.0',
            'reference' => 'fe5ea303b0887d5caefd3d431c3e61ad47037001',
            'type' => 'library',
            'install_path' => __DIR__ . '/../psr/log',
            'aliases' => array(),
            'dev_requirement' => false,
        ),
        'psr/log-implementation' => array(
            'dev_requirement' => false,
            'provided' => array(
                0 => '3.0.0',
            ),
        ),
    ),
);