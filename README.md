# Laravel error tracking to Telegram

## Installation

You can install the package via composer:

```bash
composer require samueletur/laravel-error-tracking-to-telegram
```

Create report function on app/Exceptions/Handler.php

```bash
    public function report(Throwable $exception)
    {
        LaravelErrorTrackingToTelegram::send($exception);

        parent::report($exception);
    }
```

You can publish the config file with:

```bash
php artisan vendor:publish --tag=error_tracking_telegram_config
```

This is the contents of the published config file:

```php
return [
    'telegram_bot_token' => env('TELEGRAM_BOT_TOKEN'),
    'telegram_chat_id' => env('TELEGRAM_CHAT_ID')
];
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Credits

- [Samuel Etur](https://github.com/samueletur)
