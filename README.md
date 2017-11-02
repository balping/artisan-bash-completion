Artisan Bash Completion
=======================

Original projecs:
* https://github.com/janka/artisanBashCompletion
* https://github.com/argakiig/artisanBashCompletion

This adds bash completion for Laravel 5.5 artisan CLI.

## Install

```
composer install balping/artisan-bash-completion
```

This package works with package auto-discovery, so you don't need to register a service provider.

Create an alias for the php artisan command with the likes of `echo 'alias artisan="php artisan"' >> ~/.bash_profile`

Put the file `artisan` (found in the root of this repo) to `/etc/bash_completion.d/` and remember to source it with `. /etc/bash_completion.d/artisan` (or source every completion script with `. /etc/bash_completion`) if it does not happen already on your system.

Now use `artisan ` and start tabbing away...

## Lincense

Service Provider licensed under GPL v3. GPL doesn't apply to other files.