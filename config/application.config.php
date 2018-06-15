<?php

return array(
    'modules' => require __DIR__ . '/modules.config.php',
    'module_listener_options' => array(
        'module_paths' => array(
            './module',
            './vendor',
        ),
        // local/global config location when needed
        //'config_glob_paths' => array(
        //    'config/autoload/{,*.}{global,local}.php',
        //),
    ),
);
