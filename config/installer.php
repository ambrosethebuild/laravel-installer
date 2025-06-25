<?php

// config for AmbroseTheBuild/LaravelInstaller
return [
    'required_extensions' => [
        'openssl', 'pdo', 'mbstring', 'tokenizer', 'xml', 'ctype', 'json', 'bcmath',
    ],
    'folders' => [
        'storage/logs',
        'bootstrap/cache',
        'storage/framework',
    ],
];
