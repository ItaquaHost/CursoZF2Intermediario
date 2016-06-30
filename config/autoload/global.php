<?php

/**
 * Global Configuration Override
 *
 * You can use this file for overriding configuration values from modules, etc.
 * You would place values in here that are agnostic to the environment and not
 * sensitive to security.
 *
 * @NOTE: In practice, this file will typically be INCLUDED in your source
 * control, so do not include passwords or other sensitive information in this
 * file.
 */
return array(
    'mail' => array(
        'name' => 'smtp.gmail.com',
        'host' => 'smtp.gmail.com',
        'port' => 587,
        'connection_class' => 'login',
        'connection_config' => array(
            'username' => 'thiago.rodrigues.tk@gmail.com',
            'password' => '10.tr4x.07',
            'ssl' => 'tls',
            'from' => 'thiago.rodrigues.tk@gmail.com'
        )
    )
);
