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

Create and set parameters on .env
```bash
TELEGRAM_BOT_TOKEN='XXXXXXXXXX:XXXXXXXxxxXXxxXxXxx-xXxxXXxXXxXXxxx'
TELEGRAM_CHAT_ID=999999999
```

Create a bot token on Telegram

Crie uma conta no Telegram  
Inicie uma conversa com o @botfather (lembre-se que os robôs oficiais do Telegram têm um tique azul do lado do nome)  
Clique em iniciar  
Escolha o comando /newbot  
Escolha o nome do seu chatbot e faça as configurações gerais  


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
