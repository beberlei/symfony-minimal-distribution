# Symfony Minimal Distribution

This is the minimal Symfony distribution.

It only contains the following bundles:

- FrameworkBundle
- MonologBundle
- TwigBundle
- WebDebugBundle in `dev`-environment

It only contains one configuration file at `app/config/config.yml`
that is parameterized by a environment variables from the
phpdotenv file `.env` that you need to create in the project root.

This file contains environment variables:

    SYMFONY_ENV=dev
    SYMFONY_DEBUG=1
    SYMFONY__SECRET=abcdefg
    SYMFONY__MONOLOG_ACTION_LEVEL=debug

Blog post explaining the reasoning for this approach:

- http://whitewashing.de/2014/10/26/symfony_all_the_things_web.html

### PHP built-in web server using `app/console server:[run|start]`

You need to modify the `web/index.php` file by adding `Dotenv::makeMutable();`
before the call to `Dotenv::load()`:

```php
<?php

require_once __DIR__ . "/../vendor/autoload.php";
require_once __DIR__ . "/../app/AppKernel.php";

use Symfony\Component\HttpFoundation\Request;

Dotenv::load(__DIR__ . '/../');
Dotenv::makeMutable();

$request = Request::createFromGlobals();
$kernel = new AppKernel($_SERVER['SYMFONY_ENV'], (bool)$_SERVER['SYMFONY_DEBUG']);
$response = $kernel->handle($request);
$response->send();
$kernel->terminate($request, $response);
```
