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
