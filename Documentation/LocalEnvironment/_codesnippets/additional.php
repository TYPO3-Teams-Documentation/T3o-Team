<?php

$GLOBALS['TYPO3_CONF_VARS'] = array_replace_recursive(
    $GLOBALS['TYPO3_CONF_VARS'],
    [
        'BE' => [
            'loginRateLimit' => 0,
            'passwordPolicy' => '',
        ],
        'DB' => [
            'Connections' => [
                'Default' => [
                    'dbname' => 'your_database_name',
                    'driver' => 'mysqli',
                    'host' => 'localhost',
                    'password' => 'your_password',
                    'port' => '3306',
                    'user' => 'your_username',
                ],
            ],
        ],
        'FE' => [
            'loginRateLimit' => 0,
        ],
        'GFX' => [
            'processor' => 'ImageMagick',
            'processor_path' => '/usr/bin/',
            'processor_path_lzw' => '/usr/bin/',
        ],
        'MAIL' => [
            'transport' => 'sendmail',
            'transport_sendmail_command' => '/usr/sbin/sendmail -t -i',
        ],
        'SYS' => [
            'trustedHostsPattern' => '.*',
            'devIPmask' => '*',
            'displayErrors' => 1,
        ],
    ]
);
